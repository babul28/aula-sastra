<x-modal>
    <x-slot name="title">
        Confirm Archiving Artwork
    </x-slot>

    <x-slot name="content">
        <p class="text-gray-700">
            Are you sure you want to delete this artwork?
        </p>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex-1 flex justify-end pt-4 space-x-4">
            <x-third-button wire:click="closeModal" type="button">Cancel</x-third-button>
            <x-button wire:click="archiveArtwork" type="button">Yes, Archive It</x-button>
        </div>
    </x-slot>
</x-modal>
