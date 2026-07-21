$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $PSScriptRoot
$srcDir = Join-Path $root 'resources\views\website'
$outDir = Join-Path $srcDir 'pages'
New-Item -ItemType Directory -Force -Path $outDir | Out-Null

# page => @{active; footer; cart}
$config = @{
    'newme-main.html'      = @{ active = 'main';      footer = 'full';   cart = $true  }
    'newme-store.html'     = @{ active = 'store';     footer = 'full';   cart = $true  }
    'newme-subscribe.html' = @{ active = 'subscribe'; footer = 'full';   cart = $false }
    'newme-menu.html'      = @{ active = 'menu';      footer = 'simple'; cart = $false }
    'newme-blog.html'      = @{ active = 'blog';      footer = 'simple'; cart = $false }
    'newme-product.html'   = @{ active = '';          footer = 'simple'; cart = $true  }
    'newme-consult.html'   = @{ active = 'consult';   footer = 'simple'; cart = $false }
    'newme-terms.html'     = @{ active = 'terms';     footer = 'simple'; cart = $false }
    'index.html'           = @{ active = '';          footer = '';       cart = $false; home = $true }
}

$outName = @{
    'newme-main.html'='main'; 'newme-store.html'='store'; 'newme-subscribe.html'='subscribe';
    'newme-menu.html'='menu'; 'newme-blog.html'='blog'; 'newme-product.html'='product';
    'newme-consult.html'='consult'; 'newme-terms.html'='terms'; 'index.html'='home'
}

$linkMap = [ordered]@{
    'newme-main.html'      = '/main'
    'newme-store.html'     = '/store'
    'newme-shop.html'      = '/store'
    'newme-subscribe.html' = '/subscribe'
    'newme-plans.html'     = '/subscribe'
    'newme-menu.html'      = '/menu'
    'newme-blog.html'      = '/blog'
    'newme-product.html'   = '/product'
    'newme-consult.html'   = '/consult'
    'newme-terms.html'     = '/terms'
    'index.html'           = '/'
}

$SL = [System.Text.RegularExpressions.RegexOptions]::Singleline
$IC = [System.Text.RegularExpressions.RegexOptions]::IgnoreCase

function Rewrite-Links([string]$text) {
    foreach ($k in $linkMap.Keys) {
        $text = $text.Replace($k, $linkMap[$k])
    }
    return $text
}

$assetEvaluator = {
    param($m)
    $u = $m.Value
    $seed = if ($u -match 'seed=(\d+)') { $Matches[1] } else { $null }
    if (-not $seed) { return $u }
    $w = if ($u -match 'width=(\d+)') { $Matches[1] } else { '0' }
    $h = if ($u -match 'height=(\d+)') { $Matches[1] } else { '0' }
    return "{{ asset('assets/images/p${seed}_${w}x${h}.jpg') }}"
}

foreach ($file in $config.Keys) {
    $path = Join-Path $srcDir $file
    if (-not (Test-Path $path)) { Write-Host "SKIP missing $file"; continue }
    $raw = [System.IO.File]::ReadAllText($path, [System.Text.Encoding]::UTF8)
    $cfg = $config[$file]

    $title = ([regex]::Match($raw, '<title>(.*?)</title>', $SL)).Groups[1].Value.Trim()
    $theme = ([regex]::Match($raw, 'name="theme-color"\s+content="(.*?)"', $IC)).Groups[1].Value
    if (-not $theme) { $theme = '#122B4A' }

    # collect all <style> blocks
    $styleBlocks = [regex]::Matches($raw, '<style>(.*?)</style>', $SL)
    $css = ($styleBlocks | ForEach-Object { $_.Groups[1].Value }) -join "`n"

    # extra (non-font) stylesheet links in head
    $extraCss = ''
    foreach ($lm in [regex]::Matches($raw, '<link[^>]+rel="stylesheet"[^>]+href="(https?:[^"]+)"[^>]*>', $IC)) {
        $href = $lm.Groups[1].Value
        if ($href -notmatch 'fonts\.googleapis|fonts\.gstatic') { $extraCss += $lm.Value + "`n" }
    }

    $body = ([regex]::Match($raw, '<body[^>]*>(.*)</body>', $SL)).Groups[1].Value

    # rewrite internal links across whole body (incl. inline scripts)
    $body = Rewrite-Links $body

    # extract scripts (in order) then remove from body
    $scripts = @()
    foreach ($sm in [regex]::Matches($body, '<script.*?</script>', $SL)) { $scripts += $sm.Value }
    $body = [regex]::Replace($body, '<script.*?</script>', '', $SL)

    # localize static images in body markup
    $body = [regex]::Replace($body, "https://image\.pollinations\.ai/prompt/[^""'<> ]+", $assetEvaluator)

    # swap shared components
    $navInclude = "@include('website.partials.nav', ['active' => '$($cfg.active)', 'showCart' => " + ($(if ($cfg.cart) { 'true' } else { 'false' })) + "])"
    $body = [regex]::Replace($body, '<nav class="main">.*?</nav>', [System.Text.RegularExpressions.MatchEvaluator]{ param($m) $navInclude }, $SL)

    $footerInclude = "@include('website.partials.footer', ['variant' => '$($cfg.footer)'])"
    $body = [regex]::Replace($body, '<footer.*?</footer>', [System.Text.RegularExpressions.MatchEvaluator]{ param($m) $footerInclude }, $SL)

    # mobile menu is a single line
    $body = [regex]::Replace($body, '(?m)^.*class="mmenu".*$', "@include('website.partials.mobile-menu')")

    # build scripts push: external as-is, inline wrapped in verbatim + placeholder for dynamic images
    $scriptOut = ''
    foreach ($s in $scripts) {
        if ($s -match '<script[^>]*\bsrc=') {
            $scriptOut += $s + "`n"
        } else {
            $inner = ([regex]::Match($s, '<script[^>]*>(.*)</script>', $SL)).Groups[1].Value
            $inner = $inner.Replace('https://image.pollinations.ai/prompt/', '/assets/images/placeholder.svg?p=')
            $scriptOut += "<script>`n@verbatim`n" + $inner + "`n@endverbatim`n</script>`n"
        }
    }

    # assemble blade
    $sb = New-Object System.Text.StringBuilder
    [void]$sb.AppendLine("@extends('website.layouts.app')")
    [void]$sb.AppendLine("")
    [void]$sb.AppendLine("@section('title', '$($title.Replace("'","\'"))')")
    [void]$sb.AppendLine("@section('theme', '$theme')")
    [void]$sb.AppendLine("")
    [void]$sb.AppendLine("@push('styles')")
    if ($extraCss) { [void]$sb.AppendLine($extraCss.TrimEnd()) }
    [void]$sb.AppendLine("<style>")
    [void]$sb.AppendLine("@verbatim")
    [void]$sb.AppendLine($css.Trim())
    [void]$sb.AppendLine("@endverbatim")
    [void]$sb.AppendLine("</style>")
    [void]$sb.AppendLine("@endpush")
    [void]$sb.AppendLine("")
    [void]$sb.AppendLine("@section('content')")
    [void]$sb.AppendLine($body.Trim())
    if (-not $cfg.home) { [void]$sb.AppendLine("@include('website.partials.mobile-menu')") }
    [void]$sb.AppendLine("@endsection")
    [void]$sb.AppendLine("")
    [void]$sb.AppendLine("@push('scripts')")
    [void]$sb.AppendLine($scriptOut.TrimEnd())
    [void]$sb.AppendLine("@endpush")

    # de-duplicate mobile-menu include if body already had one
    $out = $sb.ToString()
    $firstIdx = $out.IndexOf("@include('website.partials.mobile-menu')")
    if ($firstIdx -ge 0) {
        $lastIdx = $out.LastIndexOf("@include('website.partials.mobile-menu')")
        if ($lastIdx -ne $firstIdx) {
            # keep the earlier one (from body), drop the appended fallback
            $out = $out.Remove($lastIdx, "@include('website.partials.mobile-menu')".Length)
        }
    }

    $dest = Join-Path $outDir ($outName[$file] + '.blade.php')
    $utf8NoBom = New-Object System.Text.UTF8Encoding($false)
    [System.IO.File]::WriteAllText($dest, $out, $utf8NoBom)
    $remain = ([regex]::Matches($out, 'image\.pollinations\.ai')).Count
    Write-Host "OK  $($outName[$file]).blade.php  (styles=$($styleBlocks.Count) scripts=$($scripts.Count) pollinations_left=$remain)"
}
