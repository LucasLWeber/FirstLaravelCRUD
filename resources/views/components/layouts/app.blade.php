<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-notifications />
    {{ $slot }}
</body>
</html>