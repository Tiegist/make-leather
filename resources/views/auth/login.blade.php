<x-auth-split-layout>
    <div class="text-center">
        <p class="text-xs font-medium tracking-[0.18em] uppercase text-slate-500">Sign in</p>
        <h2 class="mt-3 text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900">
            Welcome back
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Access your portfolio dashboard and product showcase.
        </p>
    </div>

    <x-auth-session-status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-7 space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[13px] text-slate-700" />
            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-xl border-slate-200 bg-white shadow-sm shadow-black/5 placeholder:text-slate-400 focus:border-[#b07a3a] focus:ring-[#b07a3a] focus:ring-4 focus:ring-[rgba(176,122,58,0.22)] transition duration-200 ease-out"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="you@company.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-[13px] text-slate-700" />
            <x-text-input
                id="password"
                class="mt-2 block w-full rounded-xl border-slate-200 bg-white shadow-sm shadow-black/5 placeholder:text-slate-400 focus:border-[#b07a3a] focus:ring-[#b07a3a] focus:ring-4 focus:ring-[rgba(176,122,58,0.22)] transition duration-200 ease-out"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••••••"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="w-full inline-flex items-center justify-center rounded-xl bg-[#b07a3a] px-4 py-3 text-sm font-semibold text-white shadow-[0_18px_40px_-18px_rgba(176,122,58,0.9)] hover:brightness-[1.03] active:brightness-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[rgba(176,122,58,0.32)] transition duration-200 ease-out"
        >
            {{ __('Log in') }}
        </button>
    </form>
</x-auth-split-layout>
