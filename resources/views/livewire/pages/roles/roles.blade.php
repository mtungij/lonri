
<div>



<form  class="w-full">
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm  font-medium text-gray-900 dark:text-white">Payment Method</label>
    <input type="text" wire:model="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mfano Cash" required />
  </div>

  <button  wire:loading.remove  wire:click.prevent="save" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>





<div class="relative overflow-x-auto mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Aina Ya Malipo
                </th>
              
            </tr>
        </thead>
        <tbody>
       
        @forelse($roles as $role)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap uppercase dark:text-white">
                  {{$role->name}}
                </th>
                
            </tr>
            
        @empty
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap uppercase dark:text-white">
                  No Role
                </th>
                
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div