
<div class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="w-full">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
          <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
              <div class="flex items-center flex-1 space-x-4">
                  <h5>
                      <span class="text-gray-500">All Products:</span>
                      <span class="dark:text-white">123456</span>
                  </h5>
                  <h5>
                      <span class="text-gray-500">Total sales:</span>
                      <span class="dark:text-white">$88.4k</span>
                  </h5>
              </div>
              <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">

<!-- Date pickers -->
<form class="ml-0 max-w-lg mx-auto flex space-x-3">

<label for="voice-search" class="sr-only">Search</label>
    <div class="relative flex-grow">
       
        <input type="text"  wire:model.live.debounce.1s="search" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
            
        </button>
    </div>

    <div class="relative">
        <label for="from-date" class="sr-only">From</label>
        <input type="date"  wire:model="startDate" id="from-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-32" />
    </div>

   
    <div class="relative">
        <label for="to-date" class="sr-only">To</label>
        <input type="date" wire:model="endDate" id="to-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-32" />
    </div>

    <!-- Search input -->
   
</form>

<!-- Additional buttons -->
<button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
    </svg>
    Export
</button>
</div>



          </div>
          <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                        
                          <th scope="col" class="px-4 py-3">S/No</th>
                          <th scope="col" class="px-4 py-3">Jina Kamili</th>
                          <th scope="col" class="px-4 py-3">Staff</th>
                          <th scope="col" class="px-4 py-3">Withdraw</th>
                          <th scope="col" class="px-4 py-3">Profit</th>
                          <th scope="col" class="px-4 py-3">Balance</th>
                          <th scope="col" class="px-4 py-3">Date</th>
                          <th scope="col" class="px-4 py-3">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse($this->payments as $index=>$payment)
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                          
                          <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         
                            {{sprintf('%02d' , $index + 1)}}
                          </th>
                          
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center uppercase">
                                 
                              {{$payment->customer->fname}}
                              </div>
                          </td>

                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center uppercase">
                                 
                                 {{$payment->user->name}}
                              </div>
                          </td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$payment->withdrawal}}</td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$payment->profit}}</td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$payment->amount}}</td>
                         
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center">
                                 
                                  {{$payment->created_at}}
                              </div>
                          </td>
                          <td class="px-4 py-2"><button wire:click="delete({{$payment->id}})" 
                          type="button" id="deleteProductButton" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900" wire:confirm.prompt="Enter password to confirm delete. confirm|lonri">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Delete 
                                </button></td>
                         
                      </tr>
                      @empty
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                          <td class="w-4 px-4 py-3">
                             hakuna jipya
                          </td>
                          
                      </tr>
                      @endforelse

                      <tr class="border-b dark:border-gray-700">
               <td></td>
               <td></td>
                <td class="  px-4 py-3 font-bold text-gray-800 dark:text-white">TOTAL</td>

                 <td class=" px-4 py-3 font-bold text-gray-800  dark:text-white">{{number_format($todayWithdrawal)}}</td>
                 <td class=" px-4 py-3 font-bold text-gray-800  dark:text-white">{{number_format($profit)}}</td>
              </tr>
                  </tbody>
              </table>
          </div>
        
      </div>
  </div>
</div>

