<?php

namespace App\Http\Livewire\News;

use Illuminate\Http\Request;
use Livewire\Component;

class SearchNews extends Component
{
    public ?string $search = null;

    public function mount(Request $req)
    {
        $this->fill($req->only('search'));
    }

    public function updating($property, $value)
    {
        if ($this->$property !== $value) {
            $this->emit('updatingFilter', [
                $property => $value,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.news.search-news');
    }
}
