<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ __('Dashboard') }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Have a snapshot information of your assets and performance.</div>
        </div>
    </x-slot>

    @php
        $isAdmin = $isAdmin ?? (auth()->user()?->isAdmin() ?? false);
        $stats = $stats ?? ['categories' => null, 'products' => null, 'users' => null];
    @endphp

    @if($isAdmin)
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <a href="{{ route('admin.categories') }}" class="block rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition dark:bg-gray-900 dark:border-gray-800">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Categories</div>
                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-200">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M4 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H4zM4 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H4zM12 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM12 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['categories'] ?? '—' }}</div>
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Total categories</div>
            </a>

            <a href="{{ route('admin.products') }}" class="block rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition dark:bg-gray-900 dark:border-gray-800">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Products</div>
                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-200">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H4zm1 3h10v2H5V6zm0 4h10v2H5v-2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['products'] ?? '—' }}</div>
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Total products</div>
            </a>

            <a href="{{ route('admin.users') }}" class="block rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition dark:bg-gray-900 dark:border-gray-800">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Users</div>
                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-200">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 2a5 5 0 100 10 5 5 0 000-10zM4 17a6 6 0 1112 0v1H4v-1z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-4 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['users'] ?? '—' }}</div>
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Total users</div>
            </a>
        </div>
    @else
        <div class="rounded-xl bg-white border border-gray-200 p-6 dark:bg-gray-900 dark:border-gray-800">
            <div class="text-sm text-gray-700 dark:text-gray-200">{{ __("You're logged in!") }}</div>
        </div>
    @endif
</x-app-layout>
