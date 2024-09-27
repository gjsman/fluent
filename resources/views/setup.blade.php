<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-zinc-600 p-4">
            <h1 class="text-2xl font-bold text-white">Welcome!</h1>
        </div>
        <div class="p-6 prose">
            <p>You've got this far, but there's a few things left:</p>
            <ol>
                <li>Run <code>php artisan flux:activate</code></li>
                <li>Run <code>npm run build</code></li>
                <li>Run <code>rm -rf .git</code></li>
                <li>Run <code>git init</code></li>
                <li>Run <code>git add .</code></li>
                <li>Run <code>git commit -m "Initial commit"</code></li>
                <li><a href="https://github.com/gjsman/fluent" target="_blank">Leave a star on GitHub</a></li>
            </ol>
            <p>That's it! <a href="/">Visit your site!</a></p>
        </div>
    </div>

    @livewireScripts
</body>
</html>
