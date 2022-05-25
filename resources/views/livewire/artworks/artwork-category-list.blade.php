<div class="mb-8">
    <h2 class="text-gray-700 font-semibold mb-2">Kategori Karya</h2>
    <div class="flex flex-wrap gap-2">
        @foreach ($this->categories as $item)
        <a wire:click.prevent="updateCategory('{{ $item->name }}')" href=""
            class="text-sm text-white px-4 py-1 rounded {{ $item->name === $category ? 'bg-red-600 hover:bg-red-700' : 'bg-red-400 hover:bg-red-600' }}">
            {{ $item->name }}
        </a>
        @endforeach
    </div>
</div>
