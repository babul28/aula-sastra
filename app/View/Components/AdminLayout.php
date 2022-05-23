<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    public string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title = null)
    {
        $appName = Config::get('app.name');

        $this->title = $title ? "$title | $appName" : $appName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.admin');
    }
}
