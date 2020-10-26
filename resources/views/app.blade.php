<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f86e93f7fa7a4001246cbc6&product=sop' async='async'></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-200 font-base">
@routes
@inertia
</body>
</html>