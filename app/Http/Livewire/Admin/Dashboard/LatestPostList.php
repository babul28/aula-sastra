<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class LatestPostList extends Component
{
    use WithPagination;

    public function getPostsProperty(): Collection
    {
        return Post::query()
                ->latest()
                ->limit(25)
                ->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.latest-post-list');
    }
}
