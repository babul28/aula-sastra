<x-admin-layout title="News">
    <div class="container px-6 mx-auto grid">
        <div class="flex my-6 align-items-center">
            <h2 class="flex-1 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                News
            </h2>
            <div>
                <x-button as="href" :href="route('admin.news.create')"
                    class="normal-case bg-purple-700 hover:bg-purple-800 active:bg-purple-900 focus:border-purple-900 ring-purple-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Create News
                </x-button>
            </div>
        </div>

        <livewire:admin.news.filters />

        <livewire:admin.news.lists />
    </div>
</x-admin-layout>
