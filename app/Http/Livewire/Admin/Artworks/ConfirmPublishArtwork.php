<?php

namespace App\Http\Livewire\Admin\Artworks;

use App\Services\PostService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmPublishArtwork extends ModalComponent
{
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function publishArtwork(PostService $postService): void
    {
        $postService->publishPostByUuid($this->uuid);

        $this->closeModalWithEvents([
            'refreshArchiveList',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.artworks.confirm-publish-artwork');
    }
}
