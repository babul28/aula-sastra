<x-post-layout title="Berita">
    <div class="grid xl:grid-cols-2 gap-4">
        @foreach ($news as $item)
        <a href="{{ route('news.show', $item->uuid) }}"
            class="flex flex-col md:items-center bg-white rounded-lg border shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                src="{{ $item->featuredImage->getUrl('thumbnail_vertical') }}" alt="{{ $item->featuredImage->name }}">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="line-clamp-2 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $item->title }}
                </h5>
                <p class="line-clamp-4 mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $item->description }}
                </p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $news->links() }}
    </div>
</x-post-layout>
