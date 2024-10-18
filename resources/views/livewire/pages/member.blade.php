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
                    <div class="col-span-6 text-center mt-6">


                    @if ($img)
            <img id="img-preview" class="rounded w-12 h-12 mt-5 block" src="{{$img->temporaryUrl()}}">
        @endif

                        <div wire:loading>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" width="200" height="200" style="shape-rendering: auto; display: block; background: transparent;" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g transform="rotate(0 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.9166666666666666s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(30 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.8333333333333334s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(60 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.75s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(90 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.6666666666666666s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(120 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.5833333333333334s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(150 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.5s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(180 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.4166666666666667s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(210 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.3333333333333333s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(240 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.25s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(270 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.16666666666666666s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(300 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="-0.08333333333333333s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g transform="rotate(330 50 50)">
  <rect fill="#0099cc" height="12" width="6" ry="6" rx="3" y="24" x="47">
    <animate repeatCount="indefinite" begin="0s" dur="1s" keyTimes="0;1" values="1;0" attributeName="opacity"></animate>
  </rect>
</g><g></g></g><!-- [ldio] generated by https://loading.io --></svg>
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