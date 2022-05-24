<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArtworkPostController extends Controller
{
    public function index(Request $request)
    {
        $artworks = Post::query()
            ->with('featuredImage')
            ->onlyArtworks()
            ->onlyPublished()
            ->latest()
            ->paginate()
            ->withQueryString();

        return view('artworks.index', compact('artworks'));
    }

    public function show(Request $request, Post $artwork)
    {
        $artwork->load('featuredImage');

        return view('artworks.show', compact('artwork'));
    }
}
