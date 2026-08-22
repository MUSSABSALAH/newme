<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('mail.preview.title') }}</title>
    <style>
        body { margin: 0; font-family: Tahoma, Arial, sans-serif; background: #F3F4F4; color: #1A1A1A; }
        .wrap { max-width: 920px; margin: 0 auto; padding: 32px 20px 48px; }
        h1 { color: #128C8C; margin: 0 0 8px; }
        .lead { color: #555; margin: 0 0 24px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; }
        a.card {
            display: block; background: #fff; border-radius: 8px; padding: 18px 18px 16px;
            text-decoration: none; color: inherit; border: 1px solid #E6E6E6;
        }
        a.card:hover { border-color: #128C8C; }
        .k { font-size: 12px; color: #C2186A; font-weight: bold; margin-bottom: 6px; }
        .t { font-size: 16px; font-weight: bold; margin-bottom: 10px; }
        .go { color: #128C8C; font-size: 13px; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrap">
    <h1>{{ __('mail.preview.title') }}</h1>
    <p class="lead">{{ __('mail.preview.lead') }}</p>
    <div class="grid">
        @foreach ($templates as $key => $template)
            <a class="card" href="{{ route('mail.preview.show', $key) }}">
                <div class="k">{{ __('mail.preview.sample') }}</div>
                <div class="t">{{ $template['label'] }}</div>
                <div class="go">{{ __('mail.preview.open') }} →</div>
            </a>
        @endforeach
    </div>
</div>
</body>
</html>
