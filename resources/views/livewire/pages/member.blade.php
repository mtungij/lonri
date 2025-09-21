<div class="p-4">
    <!-- Member Form -->
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-6 gap-6">
            <!-- ...other fields remain the same... -->

            <!-- Passport with live preview -->
            <div class="col-span-6 sm:col-span-3">
                <label for="img" class="block mb-2 pt-3 text-sm font-medium text-gray-900 dark:text-white">
                    Passport
                </label>
                <input type="file" wire:model="img" id="img"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500">

                <div class="text-red-500">@error('img') {{ $message }} @enderror</div>

                <!-- Live Preview -->
                @if ($img)
                    <img src="{{ $img->temporaryUrl() }}" id="img-preview" class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button wire:loading.remove wire:click.prevent="save"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300
                       font-medium rounded-lg text-sm px-5 py-2.5 text-center
                       dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Hifadhi
            </button>

            <!-- Loading Spinner -->
            <span wire:loading wire:target="img">Uploading...</span>
        </div>
    </form>

    <!-- Member List -->
    <div class="mt-6">
        @if ($members->isEmpty())
            <h1 class="text-red-500">No Members Available</h1>
        @else
            @include('livewire.pages.includes.search-customer')
        @endif

        <div class="mt-2">
            {{$members->links()}}
        </div>
    </div>
</div>
