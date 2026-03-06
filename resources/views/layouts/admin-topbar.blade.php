<header class="h-16 bg-white border-b border-gray-200 flex items-center">
    <div class="w-full px-6 flex items-center justify-between gap-4">
        <div class="min-w-0">
            @isset($header)
                {{ $header }}
            @else
                <div class="text-lg font-semibold text-gray-900">Dashboard</div>
                <div class="text-sm text-gray-500">Have a snapshot information of your assets and performance.</div>
            @endisset
        </div>

        <div class="flex items-center gap-3 shrink-0">
            <button type="button" class="p-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700" aria-label="Search">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9 3a6 6 0 104.472 10.03l2.249 2.25a1 1 0 001.414-1.415l-2.25-2.249A6 6 0 009 3zm-4 6a4 4 0 118 0 4 4 0 01-8 0z" clip-rule="evenodd" />
                </svg>
            </button>

            <button type="button" class="p-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700" aria-label="Notifications">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 2a6 6 0 00-6 6v2.586l-.707.707A1 1 0 004 13h12a1 1 0 00.707-1.707L16 10.586V8a6 6 0 00-6-6z" />
                    <path d="M10 18a2 2 0 002-2H8a2 2 0 002 2z" />
                </svg>
            </button>
        </div>
    </div>
</header>

