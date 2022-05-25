<div class="relative w-full focus-within:text-red-500 mb-4">
    <div class="absolute inset-y-0 flex items-center pl-4">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
        </svg>
    </div>
    <input wire:model.debounce="search"
        class="w-full pl-12 pr-4 py-3 text-base text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:red-red-300 focus:outline-none focus:shadow-outline-red form-input"
        type="search" placeholder="Cari Karya ..." name="search" aria-label="Search" />
</div>
