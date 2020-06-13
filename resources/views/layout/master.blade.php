<!DOCTYPE html>
<html lang="@config('app.lang', 'en')">

<head>
    <meta name="viewport" content="wdith=device-width,initial-scale=1.0" />
    <meta name="og:name" content="@config('app.name', 'Ethereal')" />
    <meta name="og:description" content="@config('app.description', 'The PHP Web Development Framework by Ethereal For Etherio')" />
    <meta name="og:title" content="{{ $title ?? 'Document' }}" />
    <title>{{ $title ?? 'Document' }} - @config('app.name', 'Ethereal')</title>
    <link rel="stylesheet" herf="https://cdn.etherio.net/normalize/normalize.css' />
    <link rel="stylesheet" herf="https://cdn.etherio.net/milligram/milligram.css' />
    @yield('style')
</head>

<body>
    
    {{-- yield without any arguments is same as `@yield('content')` --}}
    @yield

    @yield('script')

</body>

</html>
