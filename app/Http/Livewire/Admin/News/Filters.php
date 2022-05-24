<?php

namespace App\Http\Livewire\Admin\News;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Livewire\Component;

class Filters extends Component
{
    public array $filters = [
        'search' => '',
        'status' => '',
        'sort' => 'latest',
    ];

    public function mount(Request $req): void
    {
        $this->filters = array_merge(
            $this->filters,
            $req->only(['search', 'status', 'sort'])
        );
    }

    public function updatingFilters($value, $property)
    {
        if ($this->filters[$property] !== $value) {
            $this->emit('updatingFilters', $property, $value);
        }
    }

    public function getActiveFiltersProperty(): array
    {
        return array_filter(
            $this->filters,
            fn ($value, $key) => $value && !($key === 'sort' && $value === 'latest'),
            ARRAY_FILTER_USE_BOTH
        );
    }

    public function render()
    {
        return view('livewire.admin.news.filters');
    }
}
