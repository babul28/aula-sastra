<?php

namespace App\Http\Livewire\Admin\News;

use App\Services\PostService;
use LivewireUI\Modal\ModalComponent;

class ConfirmArchiveNews extends ModalComponent
{
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function archiveNews(PostService $postService): void
    {
        $postService->archivePostByUuid($this->uuid);

        $this->closeModalWithEvents([
            'refreshArchiveList',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.news.confirm-archive-news');
    }
}
