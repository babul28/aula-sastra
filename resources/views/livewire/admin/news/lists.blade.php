<div class="w-full overflow-hidden rounded-lg shadow">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse ($this->news as $item)
                <tr class="text-gray-700" wire:key="{{ $item->uuid }}">
                    <td class="px-4 py-3 text-sm">
                        {{ $item->title }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->slug }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight {{ $item->status_color }}">
                            {{ $item->status_desc }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            @unless($item->isPublished())
                            <button wire:click="publishNews('{{ $item->uuid }}')"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 border border-transparent hover:border-purple-200 rounded-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Publish" wire:key="{{ $item->uuid . 'publish' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </button>
                            @endunless
                            <a href="{{ route('admin.news.edit', $item->uuid) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 border border-transparent hover:border-purple-200 rounded-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </a>
                            @unless($item->isTrashed())
                            <button wire:click="deleteNews('{{ $item->uuid }}')"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 border border-transparent hover:border-purple-200 rounded-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Delete" wire:key="{{ $item->uuid . 'delete' }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            @endunless
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-20">
                        <div class="min-h-[4rme] flex flex-col justify-center items-center">
                            <img src="{{ asset('assets/undraw_blank_canvas.svg') }}" alt="" class="w-80">
                            <p class="text-gray-700 mt-4">Upps, There is nothing news yet!</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="px-4 py-3">
        {{ $this->news->links() }}
    </div>
</div>
