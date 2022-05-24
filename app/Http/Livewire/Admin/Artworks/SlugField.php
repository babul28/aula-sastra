<?php

namespace App\Http\Livewire\Admin\Artworks;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class SlugField extends Component
{
    public ?string $slug = '';

    public $listeners = [
        'updatingTitle' => 'generateSlug'
    ];

    public function mount(?string $slug = null)
    {
        $this->slug = old('slug', $slug);
    }

    public function generateSlug(string $title): void
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $title);
    }

    public function render()
    {
        return view('livewire.admin.artworks.slug-field');
    }
}
