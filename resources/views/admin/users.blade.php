<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">Users</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">All registered users.</div>
        </div>
    </x-slot>

    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:bg-gray-900 dark:border-gray-800 overflow-hidden">
        <div class="p-4 border-b border-gray-200 dark:border-gray-800">
            <div class="text-sm text-gray-600 dark:text-gray-300">
                Total: <span class="font-medium">{{ $users->total() }}</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 dark:bg-gray-950/40 dark:text-gray-300">
                    <tr>
                        <th class="text-left font-medium px-4 py-3">Name</th>
                        <th class="text-left font-medium px-4 py-3">Email</th>
                        <th class="text-left font-medium px-4 py-3">Role</th>
                        <th class="text-left font-medium px-4 py-3">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                    @forelse($users as $user)
                        <tr class="text-gray-800 dark:text-gray-100">
                            <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ ($user->role ?? '') === 'admin' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-200' : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300' }}">
                                    {{ $user->role ?? '—' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ optional($user->created_at)->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-6 text-gray-500 dark:text-gray-400" colspan="4">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200 dark:border-gray-800">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>

