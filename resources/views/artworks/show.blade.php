<x-post-layout :title="$post->title" :featuredImage="$post->featuredImage->getUrl()">
    <div class="">
        <span class="text-gray-800 font-semibold tracking-wide text-sm">
            Posted at - {{ $post->created_at->toDateTimeString() }}
        </span>
    </div>

    <div class="mt-6">
        {!! $post->body !!}
    </div>
</x-post-layout>
