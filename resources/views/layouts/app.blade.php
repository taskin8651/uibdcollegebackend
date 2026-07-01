<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @php
        $authSetting = \App\Models\WebsiteSetting::first();
        $authTitle = optional($authSetting)->site_title ?: trans('panel.site_title');
        $authFavicon = $authSetting ? $authSetting->getFirstMediaUrl('favicon') : null;
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $authTitle }}</title>
    @if($authFavicon)
        <link rel="icon" href="{{ $authFavicon }}">
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Noto+Sans+Devanagari:wght@500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @yield('styles')
</head>

<body>
    @yield('content')
    @yield('scripts')
</body>

</html>
