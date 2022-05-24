<x-post-layout :title="$artwork->title" :featuredImage="$artwork->featuredImage->getUrl()">
    <div class="">
        <span class="text-gray-800 font-semibold tracking-wide text-sm">
            Posted at - {{ $artwork->created_at->toDateTimeString() }}
        </span>
    </div>

    <div class="mt-6">
        {!! $artwork->body !!}
    </div>
</x-post-layout>
