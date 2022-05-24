<?php

namespace App\Http\Livewire\Admin\Artworks;

use App\Services\PostService;
use LivewireUI\Modal\ModalComponent;

class ConfirmArchiveArtwork extends ModalComponent
{
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function archiveArtwork(PostService $postService): void
    {
        $postService->archivePostByUuid($this->uuid);

        $this->closeModalWithEvents([
            'refreshArchiveList',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.artworks.confirm-archive-artwork');
    }
}
