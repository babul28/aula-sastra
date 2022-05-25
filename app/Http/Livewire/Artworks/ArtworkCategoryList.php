<?php

namespace App\Http\Livewire\Artworks;

use App\Enums\PostTypeEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Livewire\Component;

class ArtworkCategoryList extends Component
{
    public ?string $category = null;

    public function mount(Request $req)
    {
        $this->fill($req->only('category'));
    }

    public function updateCategory($value): void
    {
        $this->category = $this->category !== $value ? $value : '';

        $this->emit('updatingFilter', [
                'category' => $this->category,
            ]);
    }

    public function getCategoriesProperty(): Collection
    {
        return Category::query()
            ->whereType(PostTypeEnum::ARTWORKS)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.artworks.artwork-category-list');
    }
}
