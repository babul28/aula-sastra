<x-admin-layout title="Edit {{ $artwork->title }}">

    <div class="container px-6 mx-auto grid">
        <div class="flex my-6 align-items-center">
            <h2 class="flex-1 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit {{ $artwork->title }}
            </h2>
            <div>
                <x-button type="button"
                    onclick="event.preventDefault(); document.getElementById('update-artwork-form').submit();"
                    class="normal-case bg-purple-700 hover:bg-purple-800 active:bg-purple-900 focus:border-purple-900 ring-purple-300">
                    Update
                </x-button>
            </div>
        </div>

        <form id="update-artwork-form" method="POST" action="{{ route('admin.artworks.update', $artwork->uuid) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid xl:grid-cols-4 gap-8">
                <div class="xl:col-span-3">
                    <div x-data="" class="mb-5">
                        <x-label for="title" class="text-base font-semibold text-gray-700 mb-3">Title</x-label>
                        <x-input @input="Livewire.emit('updatingTitle', $event.target.value)" type="text" name="title"
                            id="title" class="w-full" value="{{ old('title', $artwork->title) }}" />
                        <x-input-error for="title" />
                    </div>

                    <div>
                        <textarea name="body" id="description" class="hidden">
                            {{ old('body', $artwork->body) }}
                        </textarea>
                        <x-input-error for="body" />
                    </div>
                </div>
                <div class="">
                    <h5 class="my-4 font-semibold text-gray-700">Post Detail</h5>

                    <div class="mb-5">
                        <x-label for="type" class="mb-2">Post Type</x-label>
                        <x-input type="text" class="w-full" name="type" id="type" readonly
                            value="{{ App\Enums\PostTypeEnum::ARTWORKS }}" />
                    </div>

                    <livewire:admin.artworks.slug-field :slug="$artwork->slug" />

                    <div class="mb-5">
                        <x-label for="status" class="mb-2">Visibility</x-label>
                        <select name="status" id="status"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full {{ $errors->has('status') ? 'border-red-300 focus:border-red-300 focus:ring-red-200' : '' }}">
                            value="{{ old('status', $artwork->status) }}">
                            <option value="draft">Draft</option>
                            <option value="published" selected>Published</option>
                        </select>
                        <x-input-error for="status" />
                    </div>

                    <div x-data="{ featureImageName: `{{ $artwork->getFirstMedia('featured_image')->name }}`, featureImagePreview: `{{ $artwork->getFirstMedia('featured_image')->getUrl('thumbnail') }}` }"
                        class="mb-5">
                        <x-label for="status" class="mb-2">Featured Image</x-label>
                        <div @click="$refs.file.click()"
                            class="h-[10rem] flex items-center justify-center bg-gray-100 text-gray-700 text-sm cursor-pointer rounded">
                            <template x-if="!featureImageName">
                                <span>Upload Featured Image</span>
                            </template>

                            <template x-if="featureImageName">
                                <span class="w-full min-h-full"
                                    x-bind:style="`background-repeat: no-repeat; background-position: center; background-size: contain; background-image: url('${featureImagePreview}');`"></span>
                            </template>
                        </div>

                        <template x-if="featureImageName">
                            <div class="px-4 py-2 text-xs text-gray-700 bg-gray-100 rounded mt-1"
                                x-text="featureImageName"></div>
                        </template>
                        <x-input x-ref="file" @change="
                                featureImageName = $refs.file.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    featureImagePreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.file.files[0]);
                            " type="file" name="featured_image" id="featured_image" hidden />
                    </div>

                    <hr>
                    <h5 class="my-4 font-semibold text-gray-700">SEO (Search Engine Optimization)</h5>

                    <div class="mb-5">
                        <x-label for="meta.title" class="mb-2">Meta Title</x-label>
                        <x-input type="text" class="w-full" name="meta[title]" id="meta.title"
                            value="{{ old('meta.title', $artwork->meta['title']) }}"
                            :isError="$errors->has('meta.title')" />
                        <x-input-error for="meta.title" />
                    </div>

                    <div class="mb-5">
                        <x-label for="meta.description" class="mb-2">Meta Description</x-label>
                        <textarea name="meta[description]" id="meta.description"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 read-only:bg-gray-50 w-full {{ $errors->has('meta.description') ? 'border-red-300 focus:border-red-300 focus:ring-red-200' : '' }}"
                            rows="5">{{ old('meta.description', $artwork->meta['description']) }}</textarea>
                        <x-input-error for="meta.description" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'description', {
                toolbar: [
                    { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                    { name: 'styles', items: [ 'Styles', 'Format' ] },
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
                    { name: 'links', items: [ 'Link', 'Unlink' ] },
                    { name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
                    { name: 'tools', items: [ 'Maximize' ] },
                ],

                extraPlugins: 'autoembed,embedsemantic,image2',

                removePlugins: 'image',

                height: 700,

                format_tags: 'p;h1;h2;h3;pre',

                removeDialogTabs: 'image:advanced;link:advanced',
            });
        </script>
    </x-slot>
</x-admin-layout>
