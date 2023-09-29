<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
        <title>Manage Show Events</title>
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased bg-gray-100 flex">
        <div id="app"></div>
        @vite('resources/js/app.js')
    </body>
</html>
