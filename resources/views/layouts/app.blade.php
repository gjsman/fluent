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
        @fluxStyles
    </head>

    <body class="min-h-screen dark:bg-zinc-800">
        <x-banner />

        <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" :name="config('app.name', 'Fluent')" class="max-lg:hidden dark:hidden" />
            <flux:brand href="/" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" :name="config('app.name', 'Fluent')" class="max-lg:!hidden hidden dark:flex" />

            <flux:navbar class="max-lg:hidden">
                <flux:navbar.item icon="home" href="/">{{ __('Home') }}</flux:navbar.item>
                @if (auth()->check())
                    <flux:navbar.item icon="squares-2x2" :href="route('dashboard')">{{ __('Dashboard') }}</flux:navbar.item>
                @else

                @endif
            </flux:navbar>

            <flux:spacer />

            @if (auth()->check())
                <flux:dropdown align="end">
                    @if(Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <flux:profile avatar="{{ Auth::user()->profile_photo_url }}" />
                    @else
                        <flux:button variant="ghost" icon-trailing="chevron-down">{{ Auth::user()->name }}</flux:button>
                    @endif

                    <flux:menu>
                        <flux:menu.item icon="cog-6-tooth" :href="route('profile.show')">{{ __('Settings') }}</flux:menu.item>
                        <flux:menu.separator />
                        <flux:menu.item icon="power" href="{!! \Illuminate\Support\Facades\URL::signedRoute('logout', ['user' => Auth::user()]) !!}">{{ __('Logout') }}</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            @else
                <flux:navbar.item class="max-lg:hidden" icon="arrow-right-end-on-rectangle" :href="route('login')">{{ __('Log in') }}</flux:navbar.item>
                <flux:navbar.item class="max-lg:hidden" icon="key" :href="route('register')">{{ __('Register') }}</flux:navbar.item>
            @endif
        </flux:header>

        <flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" :name="config('app.name', 'Fluent')" class="px-2 dark:hidden" />
            <flux:brand href="/" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" :name="config('app.name', 'Fluent')" class="px-2 hidden dark:flex" />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="/">{{ __('Home') }}</flux:navlist.item>
                @if (auth()->check())
                    <flux:navlist.item icon="squares-2x2" :href="route('dashboard')">{{ __('Dashboard') }}</flux:navlist.item>
                @else

                @endif
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                @if (auth()->check())
                    <flux:navlist.item icon="cog-6-tooth" :href="route('profile.show')">{{ __('Settings') }}</flux:navlist.item>
                @else
                    <flux:navlist.item icon="arrow-right-end-on-rectangle" :href="route('login')">{{ __('Log in') }}</flux:navlist.item>
                    <flux:navlist.item icon="key" :href="route('register')">{{ __('Register') }}</flux:navlist.item>
                @endif
            </flux:navlist>
        </flux:sidebar>

        <flux:main container>
            {{ $slot }}
        </flux:main>

        @stack('modals')
        @livewireScripts
        @fluxScripts
    </body>
</html>
