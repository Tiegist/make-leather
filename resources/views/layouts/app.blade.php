<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @php
            $user = Auth::user();
            $isAdmin = false;
            if ($user) {
                $hasRoleAdmin = method_exists($user, 'hasRole') ? $user->hasRole('admin') : false;
                $fieldAdmin = ($user->role ?? null) === 'admin';
                $methodAdmin = method_exists($user, 'isAdmin') ? $user->isAdmin() : false;

                $isAdmin = $hasRoleAdmin || $fieldAdmin || $methodAdmin;
            }
        @endphp

        @if($isAdmin)
            <div class="min-h-screen bg-gray-100 md:flex">
                @include('layouts.admin-sidebar')

                <div class="flex-1">
                    <!-- Mobile fallback (keeps existing nav on small screens) -->
                    <div class="md:hidden">
                        @include('layouts.navigation')
                    </div>

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        @else
            <div class="min-h-screen bg-gray-100">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @endif
    </body>
</html>
