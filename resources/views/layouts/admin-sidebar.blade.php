@php
    $user = Auth::user();
    $name = $user?->name ?? 'Admin User';
    $email = $user?->email ?? '';
    $initials = collect(preg_split('/\s+/', trim($name)))
        ->filter()
        ->take(2)
        ->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))
        ->join('');
@endphp

<aside class="hidden md:flex md:flex-col md:w-72 md:shrink-0 bg-white border-r border-gray-200 min-h-screen">
    <div class="h-16 flex items-center px-6 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
            <div class="leading-tight">
                <div class="font-semibold text-gray-900">{{ config('app.name', 'Make Leather') }}</div>
                <div class="text-xs text-gray-500">Premium leather products</div>
            </div>
        </a>
    </div>

    <div class="flex-1 px-4 py-5 overflow-y-auto">
        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 mb-2">Core</div>
        <nav class="space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.categories') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.categories') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M4 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H4zM4 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H4zM12 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM12 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </span>
                <span>Categories</span>
            </a>

            <a href="{{ route('admin.products') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.products') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H4zm1 3h10v2H5V6zm0 4h10v2H5v-2z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span>Products</span>
            </a>

            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.users') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10 2a5 5 0 100 10 5 5 0 000-10zM4 17a6 6 0 1112 0v1H4v-1z" />
                    </svg>
                </span>
                <span>Users</span>
            </a>

            <a href="{{ route('admin.properties') }}" class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.properties') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="flex items-center gap-3">
                    <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h10a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7zM8 17v-4a1 1 0 011-1h2a1 1 0 011 1v4H8z" />
                        </svg>
                    </span>
                    <span>Properties</span>
                </span>
                <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>

            <a href="{{ route('admin.customers') }}" class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.customers') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="flex items-center gap-3">
                    <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 2a5 5 0 100 10 5 5 0 000-10zM4 17a6 6 0 1112 0v1H4v-1z" />
                        </svg>
                    </span>
                    <span>Customers</span>
                </span>
                <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>

        <div class="mt-6 text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 mb-2">Marketing</div>
        <nav class="space-y-1">
            <a href="{{ route('admin.sales-marketing') }}" class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.sales-marketing') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="flex items-center gap-3">
                    <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2 10a8 8 0 1114.32 4.906l1.387 1.387a1 1 0 01-1.414 1.414l-1.387-1.387A8 8 0 012 10zm8-6a6 6 0 100 12 6 6 0 000-12z" />
                        </svg>
                    </span>
                    <span>Sales &amp; Marketing</span>
                </span>
                <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>

            <a href="{{ route('admin.plans-performance') }}" class="flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.plans-performance') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="flex items-center gap-3">
                    <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm3 3h8v2H6V6zm0 4h8v2H6v-2z" />
                        </svg>
                    </span>
                    <span>Plans &amp; Performance</span>
                </span>
                <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>
    </div>

    <div class="px-4 pb-5">
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-gray-900 text-white flex items-center justify-center text-sm font-semibold">
                    {{ $initials ?: 'AU' }}
                </div>
                <div class="min-w-0">
                    <div class="text-sm font-medium text-gray-900 truncate">{{ $name }}</div>
                    <div class="text-xs text-gray-500 truncate">{{ $email }}</div>
                </div>
            </div>

            <div class="mt-4 space-y-1">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                    <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 2a5 5 0 100 10 5 5 0 000-10zM4 17a6 6 0 1112 0v1H4v-1z" />
                        </svg>
                    </span>
                    <span>Account</span>
                </a>

                <button type="button" @click="toggle()" class="w-full flex items-center justify-between px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                    <span class="flex items-center gap-3">
                        <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 2a.75.75 0 01.75.75V4a.75.75 0 01-1.5 0V2.75A.75.75 0 0110 2zm6.364 3.636a.75.75 0 010 1.061l-.884.884a.75.75 0 11-1.06-1.06l.883-.885a.75.75 0 011.061 0zM18 10a.75.75 0 01-.75.75H16a.75.75 0 010-1.5h1.25A.75.75 0 0118 10zM5.276 6.52a.75.75 0 11-1.06 1.06l-.885-.883a.75.75 0 111.06-1.061l.885.884zM4 10a.75.75 0 01-.75.75H2a.75.75 0 010-1.5h1.25A.75.75 0 014 10zm1.216 6.48a.75.75 0 010-1.06l.884-.885a.75.75 0 111.06 1.06l-.883.885a.75.75 0 01-1.061 0zM10 16a.75.75 0 01.75.75V18a.75.75 0 01-1.5 0v-1.25A.75.75 0 0110 16zm6.48 1.216a.75.75 0 01-1.06 0l-.885-.884a.75.75 0 111.06-1.06l.885.883a.75.75 0 010 1.061z" />
                                <path d="M10 6a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                        </span>
                        <span>Dark mode</span>
                    </span>
                    <span class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors" :class="dark ? 'bg-gray-900' : 'bg-gray-200'">
                        <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform" :class="dark ? 'translate-x-4' : 'translate-x-1'"></span>
                    </span>
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                        <span class="inline-flex items-center justify-center h-5 w-5 rounded bg-gray-100 text-gray-600">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M3 4.75A1.75 1.75 0 014.75 3h6.5A1.75 1.75 0 0113 4.75v2.5a.75.75 0 01-1.5 0v-2.5a.25.25 0 00-.25-.25h-6.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h6.5a.25.25 0 00.25-.25v-2.5a.75.75 0 011.5 0v2.5A1.75 1.75 0 0111.25 17h-6.5A1.75 1.75 0 013 15.25V4.75z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M13.72 10.53a.75.75 0 000-1.06l-2.25-2.25a.75.75 0 10-1.06 1.06l.97.97H7.75a.75.75 0 000 1.5h3.63l-.97.97a.75.75 0 101.06 1.06l2.25-2.25z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Log out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

