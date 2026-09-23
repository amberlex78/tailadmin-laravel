@props([
    'title',
    'description',
])

<div class="flex flex-col justify-between gap-4 border-b border-gray-200 py-4 first:pt-0 last:border-b-0 last:pb-0 sm:flex-row sm:items-end dark:border-gray-800">
    <div>
        <span class="mb-1 block text-base font-medium text-gray-800 dark:text-white/90">{{ $title }}</span>
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
    </div>
    @if (isset($actions))
        <div>{{ $actions }}</div>
    @endif
</div>
