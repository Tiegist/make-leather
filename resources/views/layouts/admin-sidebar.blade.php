<aside class="hidden md:flex md:flex-col md:w-64 md:shrink-0 bg-white border-r border-gray-200 min-h-screen">
    <div class="h-16 flex items-center px-6 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
            <span class="font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</span>
        </a>
    </div>

    <div class="flex-1 px-4 py-4 space-y-1">
        <a
            href="{{ route('dashboard') }}"
            class="group flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
        >
            <span class="w-2 h-2 rounded-full {{ request()->routeIs('dashboard') ? 'bg-gray-900' : 'bg-gray-300 group-hover:bg-gray-500' }}"></span>
            <span>Dashboard</span>
        </a>

        <a
            href="{{ route('profile.edit') }}"
            class="group flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('profile.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
        >
            <span class="w-2 h-2 rounded-full {{ request()->routeIs('profile.*') ? 'bg-gray-900' : 'bg-gray-300 group-hover:bg-gray-500' }}"></span>
            <span>Profile</span>
        </a>
    </div>

    <div class="px-4 py-4 border-t border-gray-100">
        <div class="px-3 pb-3">
            <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                Log Out
            </button>
        </form>
    </div>
</aside>

