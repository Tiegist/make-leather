<x-app-layout>
    <x-slot name="header">
        <div>
            <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">Categories</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">All categories in your store.</div>
        </div>
    </x-slot>

    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:bg-gray-900 dark:border-gray-800 overflow-hidden">
        <div class="p-4 border-b border-gray-200 dark:border-gray-800">
            <div class="text-sm text-gray-600 dark:text-gray-300">
                Total: <span class="font-medium">{{ $categories->total() }}</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 dark:bg-gray-950/40 dark:text-gray-300">
                    <tr>
                        <th class="text-left font-medium px-4 py-3">Name</th>
                        <th class="text-left font-medium px-4 py-3">Slug</th>
                        <th class="text-left font-medium px-4 py-3">Active</th>
                        <th class="text-left font-medium px-4 py-3">Created</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                    @forelse($categories as $category)
                        <tr class="text-gray-800 dark:text-gray-100">
                            <td class="px-4 py-3 font-medium">{{ $category->name }}</td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $category->slug }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $category->is_active ? 'bg-green-50 text-green-700 dark:bg-green-900/30 dark:text-green-200' : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300' }}">
                                    {{ $category->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ optional($category->created_at)->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-6 text-gray-500 dark:text-gray-400" colspan="4">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200 dark:border-gray-800">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>

