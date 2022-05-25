<?php

namespace App\Http\Livewire\Admin\Artworks;

use App\Enums\PostTypeEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CategoryField extends Component
{
    public ?int $categoryId = null;

    public function mount(?int $categoryId = null)
    {
        $this->categoryId = old('category_id', $categoryId);
    }

    public function getCategoriesProperty(): Collection
    {
        return Category::query()
            ->where('type', PostTypeEnum::ARTWORKS)
            ->get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.admin.artworks.category-field');
    }
}
