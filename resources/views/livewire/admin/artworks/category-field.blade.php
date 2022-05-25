<div class="mb-5">
    <x-label for="category_id" class="mb-2">Category</x-label>
    <select wire:model="categoryId" name="category_id" id="category_id"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full {{ $errors->has('category_id') ? 'border-red-300 focus:border-red-300 focus:ring-red-200' : '' }}">
        <option value="" selected hidden>Select Category</option>
        @foreach ($this->categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <x-input-error for="category_id" />
</div>
