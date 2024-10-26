<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

         @routes
          @vite(['resources/js/app.js', 'resources/css/app.css'])
          @inertiaHead
    </head>
    <body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
        <h1 class="text-3xl font-bold underline text-red-400">
            Hello world!
          </h1>
        @inertia
<div id="app">
    <increment-counter />
</div>
    </body>
</html>
