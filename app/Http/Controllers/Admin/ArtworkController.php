<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ArtworkController extends Controller
{
    public function index(): View
    {
        return view('admin.artworks.index');
    }

    public function create()
    {
        //
    }
}
