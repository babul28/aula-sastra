<div class="mb-8">
    <div class="md:flex md:justify-around md:space-x-4">
        <div class="mb-4 md:mb-0 md:flex-1">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.debounce="filters.search"
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Search for artworks" aria-label="Search" />
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <select wire:model="filters.status" name="status" id="status"
                class="text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option value="">All Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="trashed">Trashed</option>
            </select>

            <select wire:model="filters.sort" name="sort" id="sort"
                class="text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option value="latest">Latest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>

    <div class="mt-4">
        @foreach ($this->activeFilters as $key => $activeFilter)
        <a wire:click.prevent="$set('{{ 'filters.' . $key }}', '')" href=""
            class="px-4 py-2 bg-gray-100 text-xs text-gray-700 rounded-full">{{ $key }}: {{ $activeFilter }}</a>
        @endforeach
    </div>
</div>
