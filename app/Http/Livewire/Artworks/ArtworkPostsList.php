<?php

namespace App\Http\Livewire\Artworks;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ArtworkPostsList extends Component
{
    use WithPagination;

    public ?string $search = '';

    public ?string $category = '';

    public $queryString = [
        'search' => [
            'except' => ''
        ],
        'category' => [
            'except' => ''
        ],
    ];

    public $listeners = [
        'updatingFilter' => 'updateFilter'
    ];

    public function updateFilter(array $payload): void
    {
        foreach ($payload as $property => $value) {
            $this->{$property} = $value;
        }

        $this->resetPage();
    }

    public function getArtworksProperty()
    {
        return Post::query()
            ->with(['featuredImage', 'category:id,name'])
            ->onlyArtworks()
            ->onlyPublished()
            ->latest()
            ->when(
                $this->search,
                fn (Builder $q) => (
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->where('body', 'like', '%' . $this->search . '%')
                )
            )
            ->when(
                $this->category,
                fn (Builder $q) => $q->whereRelation('category', 'name', '=', $this->category)
            )
            ->paginate();
    }

    public function render()
    {
        return view('livewire.artworks.artwork-posts-list');
    }
}
