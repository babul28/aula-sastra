<x-post-layout title="Karya">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($artworks as $artwork)
        <div
            class="max-w-sm flex flex-col bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('artworks.show', $artwork->uuid) }}">
                <img class="rounded-t-lg w-full" src="{{ $artwork->featuredImage->getUrl('thumbnail') }}"
                    alt="{{ $artwork->featuredImage->name }}" />
            </a>
            <div class="p-5 flex-1 flex flex-col">
                <div class="mb-2">
                    <span class="text-xs uppercase text-gray-700 font-semibold">
                        {{ $artwork->created_at->diffForHumans() }}
                    </span>
                </div>
                <a href="{{ route('artworks.show', $artwork->uuid) }}">
                    <h5 class="line-clamp-2 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $artwork->title }}
                    </h5>
                </a>
                <p class="flex-1 line-clamp-4 mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $artwork->description }}
                </p>
                <div class="flex justify-end">
                    <a href="{{ route('artworks.show', $artwork->uuid) }}"
                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Selengkapnya
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $artworks->links() }}
    </div>
</x-post-layout>
