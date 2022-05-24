<x-modal>
    <x-slot name="title">
        Confirm Publishing Artwork
    </x-slot>

    <x-slot name="content">
        <p class="text-gray-700">
            Are you sure you want to publish this artwork?
        </p>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex-1 flex justify-end pt-4 space-x-4">
            <x-third-button wire:click="closeModal" type="button">Cancel</x-third-button>
            <x-button wire:click="publishArtwork" type="button">Yes, Publish It</x-button>
        </div>
    </x-slot>
</x-modal>
