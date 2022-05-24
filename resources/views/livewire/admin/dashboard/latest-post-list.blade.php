<div class="w-full overflow-hidden rounded-lg shadow">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($this->posts as $post)
                <tr class="text-gray-700 dark:text-gray-400" wire:key="{{ $post->uuid }}">
                    <td class="px-4 py-3 text-sm">
                        {{ $post->title }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $post->slug }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight {{ $post->type_color }}">
                            {{ ucfirst($post->type) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight {{ $post->status_color }}">
                            {{ $post->status_desc }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $post->created_at->diffForHumans() }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-20">
                        <div class="min-h-[4rme] flex flex-col justify-center items-center">
                            <img src="{{ asset('assets/undraw_blank_canvas.svg') }}" alt="" class="w-80">
                            <p class="text-gray-700 mt-4">Upps, There is nothing posts yet!</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
