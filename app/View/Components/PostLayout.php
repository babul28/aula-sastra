<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostLayout extends Component
{
    public string $title;

    public string $header;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, public ?string $featuredImage = null)
    {
        $appName = config('app.name');

        $this->title = "$title | $appName";

        $this->header = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.post');
    }
}
