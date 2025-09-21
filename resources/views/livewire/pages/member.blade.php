<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <!-- Form -->
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-6 gap-6">
            <!-- Full Name -->
            <div class="col-span-6 sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Jina Kamili
                </label>
                <input type="text" wire:model="fname"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Jina kamili" required>
                <div class="text-red-500">@error('fname') {{ $message }} @enderror</div>
            </div>

            <!-- Nickname -->
            <div class="col-span-6 sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <span class="text-red-500">*</span> Jina Maarufu
                </label>
                <input type="text" wire:model="nickname"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Mama Jonson" required>
                <div class="text-red-500">@error('nickname') {{ $message }} @enderror</div>
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <span class="text-red-500">*</span> Namba Ya Simu
                </label>
                <input type="number" wire:model="phone"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="255..." required>
                <div class="text-red-500">@error('phone') {{ $message }} @enderror</div>
            </div>

            <!-- Gender -->
            <div class="col-span-6 sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <span class="text-red-500">*</span> Jinsia
                </label>
                <select wire:model="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Chagua Jinsia</option>
                    <option value="mwanaume">Mwanaume</option>
                    <option value="mwanamke">Mwanamke</option>
                </select>
                <div class="text-red-500">@error('gender') {{ $message }} @enderror</div>
            </div>

            <!-- Passport Upload with Live Preview -->
            <div class="col-span-6 sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Passport
                </label>
                <input type="file" wire:model="img"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <div class="text-red-500">@error('img') {{ $message }} @enderror</div>

                @if ($img)
                    <img src="{{ $img->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300
                       font-medium rounded-lg text-sm px-5 py-2.5 text-center
                       dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Hifadhi
            </button>
            <span wire:loading wire:target="img">Uploading...</span>
        </div>
    </form>

    <!-- Members List -->
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
