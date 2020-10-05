<x-jet-dialog-modal wire:model="postModalForm">
    <x-slot name="title">
        {{ __('Create Post') }}
    </x-slot>

    <x-slot name="content">
        <div class="bg-white pt-5 pb-4 ">
            <div class="">
                <div class="mb-4">
                    <label for="exampleFormControlInput1"
                           class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
                    @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput2"
                           class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput2" wire:model="body" placeholder="Enter Body"></textarea>
                    @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('postModalForm', false)" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="store()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
