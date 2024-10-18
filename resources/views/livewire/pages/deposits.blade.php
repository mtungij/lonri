<div>
   <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
       <div class="w-full">
           <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
               <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                   <div class="w-full md:w-1/2">
                       <form class="flex items-center">
                           <label for="simple-search" class="sr-only">Search</label>
                           <div class="relative w-full">
                               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                   <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                   </svg>
                               </div>
                               <input type="text" wire:model.live.debounce.1s="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                           </div>
                       </form>
                   </div>

                   <!-- Date Range Filter -->
                   <div class="w-full md:w-1/2 flex space-x-4">
                       <input type="date" wire:model="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                       <input type="date" wire:model="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                   </div>
               </div>

               <div class="overflow-x-auto">
                   <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                           <tr>
                               <th scope="col" class="px-4 py-3">S/no</th>
                               <th scope="col" class="px-4 py-3">Jina Kamili</th>
                               <th scope="col" class="px-4 py-3">Jina Maarufu</th>
                               <th scope="col" class="px-4 py-3">Deposit</th>
                               <th scope="col" class="px-4 py-3">Depositor</th>
                               <th scope="col" class="px-4 py-3">Balance</th>
                               <th scope="col" class="px-4 py-3">
                                  Actions
                               </th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse($this->payments as $index => $payment)
                           <tr class="border-b dark:border-gray-700">
                               <th scope="row" class="px-4 py-3 font-medium uppercase  whitespace-nowrap dark:text-white">{{ sprintf('%02d',$index + 1)}} </th>
                               <th scope="row" class="px-4 py-3 font-medium uppercase whitespace-nowrap dark:text-white">{{ $payment->customer->fname }}</th>
                               <td class="px-4 py-3   uppercase dark:text-white">{{ $payment->customer->nickname }}</td>
                               <td class="px-4 py-3  dark:text-white">{{number_format($payment->deposit) }}</td>
                               <td class="px-4 py-3  uppercase dark:text-white">{{ $payment->user->name }}</td>   
                               <td class="px-4 py-3  dark:text-white">{{ number_format($payment->amount)  }}</td>
                               <td class="px-4 py-3 flex items-center justify-end">
                                   <button wire:click="delete({{$payment->id}})"
                                             type="button" id="deleteProductButton" 
                                             data-drawer-target="drawer-delete-product-default" 
                                             data-drawer-show="drawer-delete-product-default" 
                                             aria-controls="drawer-delete-product-default" 
                                             data-drawer-placement="right" 
                                             class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"
                                             wire:confirm.prompt="Enter password to confirm delete. confirm|lonri"
                                             >
                                       <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                       Delete 
                                   </button>
                               </td>
                           </tr>
                           @empty
                           <tr>
                               <td colspan="6" class="px-4 py-3 text-center dark:text-white">No Deposits Found</td>
                           </tr>
                           @endforelse
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </section>
</div>
