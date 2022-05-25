<?php

namespace App\Http\Livewire\Admin\Artworks;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    public string $search = '';

    public string $status = '';

    public string $sort = 'latest';

    public $queryString = [
        'search' => [
            'except' => ''
        ],
        'status' => [
            'except' => ''
        ],
        'sort' => [
            'except' => ''
        ],
    ];

    protected $listeners = [
        'updatingFilters' => 'updateFilter',
        'refreshArchiveList' => '$refresh',
    ];

    public function mount(Request $req): void
    {
        $this->fill($req->only(['search', 'status', 'sort']));
    }

    public function updateFilter(string $property, string $value)
    {
        $this->{$property} = $value;

        $this->resetPage();
    }

    public function getArtworksProperty()
    {
        return Post::query()
                ->with(['category:id,name'])
                ->onlyArtworks()
                ->withTrashed()
                ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
                ->when($this->status, fn ($q) => $q->where('status', PostStatusEnum::getValue($this->status)))
                ->when($this->sort, fn ($q) => $this->sort === 'latest' ? $q->latest() : $q->oldest())
                ->paginate();
    }

    public function publishArtwork(string $uuid)
    {
        $this->emit(
            'openModal',
            'admin.artworks.confirm-publish-artwork',
            ['uuid' => $uuid]
        );
    }

    public function deleteArtwork(string $uuid)
    {
        $this->emit(
            'openModal',
            'admin.artworks.confirm-archive-artwork',
            ['uuid' => $uuid]
        );
    }

    public function render()
    {
        return view('livewire.admin.artworks.lists');
    }
}
