<div
    x-data
    class="fixed top-4 right-4 z-50 flex w-[calc(100vw-2rem)] max-w-sm flex-col gap-2"
    role="region"
    aria-label="Notifications"
>
    @php
        $status = session('status');
        $statusMessage = match ($status) {
            'profile-updated', 'password-updated' => __('Saved.'),
            'verification-link-sent' => __('A new verification link has been sent to your email address.'),
            default => is_string($status) ? $status : null,
        };

        $firstError =
            ($errors?->any() ? $errors->first() : null)
            ?? ($errors?->getBag('updatePassword')?->any() ? $errors->getBag('updatePassword')->first() : null)
            ?? ($errors?->getBag('userDeletion')?->any() ? $errors->getBag('userDeletion')->first() : null);
    @endphp

    @if ($statusMessage)
        <div class="sr-only" x-init="$store.toast.success(@js($statusMessage))">{{ $statusMessage }}</div>
    @endif

    @if (session('success'))
        <div class="sr-only" x-init="$store.toast.success(@js(session('success')))">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="sr-only" x-init="$store.toast.error(@js(session('error')))">{{ session('error') }}</div>
    @endif

    @if (session('warning'))
        <div class="sr-only" x-init="$store.toast.warning(@js(session('warning')))">{{ session('warning') }}</div>
    @endif

    @if (session('info'))
        <div class="sr-only" x-init="$store.toast.info(@js(session('info')))">{{ session('info') }}</div>
    @endif

    @if ($firstError)
        <div class="sr-only" x-init="$store.toast.error(@js($firstError))">{{ $firstError }}</div>
    @endif

    <template x-for="t in $store.toast.toasts" :key="t.id">
        <div
            x-show="true"
            x-transition.opacity.duration.150ms
            class="pointer-events-auto flex items-start gap-3 rounded-lg border bg-white p-4 shadow-lg"
            :class="{
                'border-green-200': t.type === 'success',
                'border-red-200': t.type === 'error',
                'border-yellow-200': t.type === 'warning',
                'border-blue-200': t.type === 'info',
            }"
            role="status"
            aria-live="polite"
        >
            <div
                class="mt-0.5 h-2.5 w-2.5 shrink-0 rounded-full"
                :class="{
                    'bg-green-500': t.type === 'success',
                    'bg-red-500': t.type === 'error',
                    'bg-yellow-500': t.type === 'warning',
                    'bg-blue-500': t.type === 'info',
                }"
                aria-hidden="true"
            ></div>

            <div class="min-w-0 flex-1">
                <p class="text-sm font-medium text-gray-900" x-text="t.message"></p>
            </div>

            <button
                type="button"
                class="inline-flex h-6 w-6 items-center justify-center rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                x-on:click="$store.toast.remove(t.id)"
                aria-label="Close notification"
            >
                <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4" aria-hidden="true">
                    <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                </svg>
            </button>
        </div>
    </template>
</div>

