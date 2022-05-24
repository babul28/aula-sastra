<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;

class ArtworkController extends Controller
{
    public function index(): View
    {
        return view('admin.artworks.index');
    }

    public function create(): View
    {
        return view('admin.artworks.create');
    }

    public function store(StorePostRequest $request, PostService $artworkService)
    {
        $artworkService->store($request->validated());

        return to_route('admin.artworks.index')->with('success', 'Successfully create new Artwork!');
    }

    public function edit(Post $artwork): View
    {
        return view('admin.artworks.edit', compact('artwork'));
    }

    public function update(UpdatePostRequest $request, Post $artwork, PostService $postService)
    {
        $postService->update($artwork, $request->validated());

        return to_route('admin.artworks.index')->with('success', 'Successfully update Artwork!');
    }
}
