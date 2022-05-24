<x-admin-layout title="Dashboard">
    <!-- Remove everything INSIDE this div to a really blank page -->
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <x-admin.cards.analytic title="Total News" :count="$postsAnalytics[0]->count" color="orange">
                <x-slot name="icon">
                    <x-icons.newspaper class="h-5 w-5" />
                </x-slot>
            </x-admin.cards.analytic>

            <x-admin.cards.analytic title="Total Artworks" :count="$postsAnalytics[1]->count" color="green">
                <x-slot name="icon">
                    <x-icons.sparkles class="h-5 w-5" />
                </x-slot>
            </x-admin.cards.analytic>

            <x-admin.cards.analytic title="Pending Artworks Submission" count="1211" color="yellow">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </x-slot>
            </x-admin.cards.analytic>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Latest Post</h3>

            <livewire:admin.dashboard.latest-post-list />
        </div>

    </div>
</x-admin-layout>
