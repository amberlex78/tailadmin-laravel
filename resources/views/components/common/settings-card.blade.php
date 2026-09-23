@props(['title'])

<x-common.section-card>
    <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90">
        {{ $title }}
    </h4>

    <div>
        {{ $slot }}
    </div>
</x-common.section-card>
