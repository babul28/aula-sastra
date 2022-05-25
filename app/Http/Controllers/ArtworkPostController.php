<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArtworkPostController extends Controller
{
    public function index(Request $request)
    {
        return view('artworks.index');
    }

    public function show(Request $request, Post $post)
    {
        $post->load('featuredImage');

        return view('artworks.show', compact('post'));
    }
}
