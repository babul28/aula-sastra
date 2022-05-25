<?php

namespace App\Http\Livewire\News;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class NewsPostsList extends Component
{
    use WithPagination;

    public ?string $search = '';

    public $queryString = [
        'search' => [
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

    public function getNewsProperty()
    {
        return Post::query()
            ->with('featuredImage')
            ->onlyNews()
            ->onlyPublished()
            ->latest()
            ->when(
                $this->search,
                fn (Builder $q) => (
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->where('body', 'like', '%' . $this->search . '%')
                )
            )
            ->paginate();
    }

    public function render()
    {
        return view('livewire.news.news-posts-list');
    }
}
