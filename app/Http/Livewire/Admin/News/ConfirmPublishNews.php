<?php

namespace App\Http\Livewire\Admin\News;

use App\Services\PostService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmPublishNews extends ModalComponent
{
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function publishNews(PostService $postService): void
    {
        $postService->publishPostByUuid($this->uuid);

        $this->closeModalWithEvents([
            'refreshArchiveList',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.news.confirm-publish-news');
    }
}
