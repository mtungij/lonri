<div>
  

<form>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3" >
                            <label for="first-name" class="block mb-2 text-sm font-medium pl-3 text-gray-900 dark:text-white"> Jina Kamili</label>
                            <input type="text" wire:model="fname" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jina kamili" required>
                            <div class="text-red-500">@error('fname') {{ $message }} @enderror</div>
                        </div>
         
                        <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="text-red-500 text-lg">*</span>Jina Maarufu</label>
                            <input type="text" wire:model="nickname" id="country" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mama Jonson" required>
                            <div class="text-red-500">@error('nickname') {{ $message }} @enderror</div>
                        </div>
                      
                        <div class="col-span-6 sm:col-span-3">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="text-red-500 text-lg">*</span>Namba Ya Simu</label>
                            <input type="number" wire:model="phone" id="address" value="255" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <div class="text-red-500">@error('phone') {{ $message }} @enderror</div>
                        </div>

                    
                        <div class="col-span-6 sm:col-span-3">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span>Jinsia</label>
                            <select id="countries" wire:model="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected>Chagua Jinsia</option>
                                <option value="mwanaume">Mwanaume</option>
                                <option value="mwanamke">Mwanamke</option>
                            </select>
                            <div class="text-red-500">@error('gender') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                            <label for="address" class="block mb-2 pt-3 text-sm font-medium text-gray-900 dark:text-white">Passport</label>
                            <input type="file" wire:model="img" id="address" value="255" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <div class="text-red-500">@error('img') {{ $message }} @enderror</div>
                        </div>
                

                        <button wire:loading.remove  wire:click.prevent="save"  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Hifadhi
                        </button>
                       
                    </div>
                </form>

                @if ($members->isEmpty())
    <h1 class="text-red-500">No Members Available</h1>
@else
   
        @include('livewire.pages.includes.search-customer')
 
@endif

{{$members->links()}}
                
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('img-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>