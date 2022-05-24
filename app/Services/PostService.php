<?php

namespace App\Services;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * Create new post and save it to database.
     *
     * @param array<string, mixed> $payload
     * @return Post
     */
    public function store(array $payload): Post
    {
        // prepare create post payload.
        $createPostPayload = array_merge(
            Arr::except($payload, 'featured_image'),
            [
                'user_id' => Auth::id(),
                'status' => PostStatusEnum::getValue($payload['status']),
                'meta' => $this->generateMeta($payload),
            ]
        );

        $post = Post::create($createPostPayload);

        if (Arr::exists($payload, 'featured_image')) {
            $post->addMedia($payload['featured_image'])
                ->withResponsiveImages()
                ->toMediaCollection('featured_image');
        }

        return $post;
    }

    /**
     * Publish a post by uuid.
     *
     * @param string $uuid
     * @return boolean
     */
    public function publishPostByUuid(string $uuid): bool
    {
        // Find post by uuid and raise exception if not found.
        $post = $this->findPostByUuid($uuid);

        return $post->forceFill([
            'status' => PostStatusEnum::PUBLISHED,
            'published_at' => Carbon::now(),
        ])->save();
    }

    /**
     * Find the post data by uuid.
     *
     * @param string $uuid
     * @return Post
     */
    public function findPostByUuid(string $uuid): Post
    {
        return Post::whereUuid($uuid)->firstOrFail();
    }

    /**
     * Archive a post by uuid.
     *
     * @param string $uuid
     * @return boolean
     */
    public function archivePostByUuid(string $uuid): bool
    {
        // Find post by uuid and raise exception if not found.
        $post = $this->findPostByUuid($uuid);

        // make the post model into archived.
        return $post->forceFill([
            'status' => PostStatusEnum::TRASHED,
        ])->save();
    }

    /**
     * Updating the post model on the database.
     *
     * @param Post $post
     * @param array<string, mixed> $payload
     * @return boolean
     */
    public function update(Post $post, array $payload): bool
    {
        // Prepare the payload for updating post model.
        $updatePostPayload = array_merge(
            Arr::except($payload, 'featured_image'),
            [
                'status' => PostStatusEnum::getValue($payload['status']),
                'meta' => $this->generateMeta($payload),
            ]
        );

        /**
         * If the payload contains featured_images,
         * then delete the old featured_image and add the new one.
         */
        if (Arr::has($payload, 'featured_image')) {
            // Delete the old featured_image.
            $post->clearMediaCollection('featured_image');

            // Add the new featured_image.
            $post->addMedia($payload['featured_image'])
                ->withResponsiveImages()
                ->toMediaCollection('featured_image');
        }

        // Update the post model.
        return $post->update($updatePostPayload);
    }

    /**
     * Generate meta tags for post.
     *
     * @param array<string, mixed> $payload
     * @return array<string, array<string, string>>
     */
    protected function generateMeta(array $payload): array
    {
        if (! Arr::has($payload, 'meta.title')) {
            $payload['meta']['title'] = $payload['title'];
        }

        if (! Arr::has($payload, 'meta.description')) {
            $payload['meta']['description'] = strip_tags($payload['description']);
        }

        return Arr::only($payload, ['meta.title', 'meta.description']);
    }
}
