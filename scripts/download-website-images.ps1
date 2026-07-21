$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $PSScriptRoot
$srcDir = Join-Path $root 'resources\views\website'
$outDir = Join-Path $root 'public\assets\images'
New-Item -ItemType Directory -Force -Path $outDir | Out-Null

$files = Get-ChildItem -Path $srcDir -Filter *.html -File
$urls = New-Object System.Collections.Generic.HashSet[string]

$regex = [regex]'https://image\.pollinations\.ai/prompt/[^"''\s\\<>]+'
foreach ($f in $files) {
    $content = Get-Content -Path $f.FullName -Raw
    foreach ($m in $regex.Matches($content)) {
        $u = $m.Value
        if ($u -match 'seed=\d+') { [void]$urls.Add($u) }
    }
}

Write-Host "Found $($urls.Count) unique static image URLs."

$map = @{}
$ok = 0; $fail = 0
foreach ($u in $urls) {
    $seed = if ($u -match 'seed=(\d+)') { $Matches[1] } else { 'x' }
    $w = if ($u -match 'width=(\d+)') { $Matches[1] } else { '0' }
    $h = if ($u -match 'height=(\d+)') { $Matches[1] } else { '0' }
    $name = "p${seed}_${w}x${h}.jpg"
    $dest = Join-Path $outDir $name
    $map[$u] = $name
    if (Test-Path $dest) { $ok++; continue }
    try {
        Invoke-WebRequest -Uri $u -OutFile $dest -TimeoutSec 120 -UseBasicParsing
        $ok++
        Write-Host "OK  $name"
    } catch {
        $fail++
        Write-Host "ERR $name  ($($_.Exception.Message))"
    }
}

$map.GetEnumerator() | ForEach-Object { "$($_.Key)`t$($_.Value)" } | Set-Content -Path (Join-Path $root 'scripts\image-map.txt') -Encoding UTF8
Write-Host "Downloaded/exists: $ok  Failed: $fail"
