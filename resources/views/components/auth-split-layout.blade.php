<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-[#0b0a08] text-slate-900 antialiased">
        <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
            <aside class="relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0b0a08] via-[#2b1c14] to-[#b07a3a]"></div>
                <div class="absolute inset-0 bg-[radial-gradient(65%_55%_at_22%_18%,rgba(255,255,255,0.18),transparent_60%),radial-gradient(55%_55%_at_76%_72%,rgba(255,255,255,0.12),transparent_62%)]"></div>
                <div class="absolute inset-0 opacity-[0.08] [background-image:linear-gradient(to_right,rgba(255,255,255,0.25)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.25)_1px,transparent_1px)] [background-size:48px_48px]"></div>

                <div class="relative h-56 lg:h-full px-6 py-10 sm:px-10 lg:px-12 lg:py-14 text-white flex flex-col justify-between">
                    <div class="flex items-center gap-3">
                        <a href="/" class="inline-flex items-center gap-3 rounded-2xl bg-white/10 ring-1 ring-white/20 px-3 py-2 backdrop-blur-sm hover:bg-white/15 transition">
                            <x-application-logo class="h-7 w-7 fill-current text-white" />
                            <span class="text-sm font-semibold tracking-tight">{{ config('app.name', 'Portfolio') }}</span>
                        </a>
                    </div>

                    <div class="max-w-xl">
                        <p class="text-xs font-medium tracking-[0.18em] text-white/80 uppercase">Premium products. Polished portfolio.</p>
                        <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight">
                            Manage your catalog with quiet confidence.
                        </h1>
                        <p class="mt-4 text-sm sm:text-base text-white/80 leading-relaxed">
                            Sign in to curate your collection, refine your showcase, and keep every detail aligned with your brand.
                        </p>
                    </div>

                    <div class="hidden lg:flex items-center gap-3 text-xs text-white/75">
                        <span class="inline-flex h-7 items-center rounded-full bg-white/10 ring-1 ring-white/15 px-3">Secure sign-in</span>
                        <span class="inline-flex h-7 items-center rounded-full bg-white/10 ring-1 ring-white/15 px-3">Refined UI</span>
                        <span class="inline-flex h-7 items-center rounded-full bg-white/10 ring-1 ring-white/15 px-3">Fast access</span>
                    </div>
                </div>
            </aside>

            <main class="bg-[#fbfaf9] flex items-center justify-center px-6 py-10 sm:px-10 lg:px-12">
                <div class="w-full max-w-md">
                    <div class="rounded-3xl bg-white shadow-[0_20px_70px_-40px_rgba(15,23,42,0.45)] ring-1 ring-black/5 px-7 py-9 sm:px-9 sm:py-10">
                        {{ $slot }}
                    </div>

                    <p class="mt-6 text-center text-xs text-slate-500">
                        © {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.
                    </p>
                </div>
            </main>
        </div>
    </body>
</html>
