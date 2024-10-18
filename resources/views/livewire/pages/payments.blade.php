
   
   <div >
   <div class="rounded shadow-xl w-full overflow-hidden">
        <div class="h-[140px] bg-gradient-to-r from-cyan-500 to-blue-500"></div>
        <div class="px-5 py-2 flex flex-col gap-3 pb-6">
            <div class="h-[90px] shadow-md w-[90px] rounded-full border-4 overflow-hidden -mt-14 border-white">
            <img class="w-full h-full rounded-full object-center object-cover"
     src="{{ $currentCustomer && $currentCustomer->img ? \Illuminate\Support\Facades\Storage::url($currentCustomer->img) : asset('assets/admin.png') }}"
     alt="Diversity">

            </div>
            <div>
                <h3 class="text-xl relative font-bold leading-6 dark:text-white uppercase"> {{ $currentCustomer ? $currentCustomer->nickname : '' }}</h3>
                <p class="text-sm  text-gray-400"> {{ $currentCustomer ? $currentCustomer->fname : '' }}</p>
            </div>
        
    <!-- Payment Deposit Component -->
    @include('livewire.pages.includes.payment-deposit')

<br>
    <!-- Withdrawal Payment Component -->
    @include('livewire.pages.includes.withdrawal-payment')


    </div>

    <div class="relative overflow-x-auto mt-4">
    <table class="w-full  bg-green-400 hover:bg-green-800 focus:ring-4 border-b border-gray-200 shadow focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:text-white dark:bg-green-400 dark:hover:bg-green-300 focus:outline-none dark:focus:ring-blue-800 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Namba Ya Simu
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Payment
                </th>
                <th scope="col" class="px-6 py-3">
                    Lipwa
                </th>
                <th scope="col" class="px-6 py-3">
                   Tolewa
                </th>
                 <th scope="col" class="px-6 py-3">
                   Salio 
                </th>
            </tr>
        </thead>
        <tbody>
        
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                   {{$currentCustomer ? $currentCustomer->phone : '******' }}
                </th>
               <td class="px-6 py-4 dark:text-white whitespace-nowrap">
                  -----
             </td>

                <td class="px-6 py-4 dark:text-white">
                    00.00
                </td>
                <td class="px-6 py-4 dark:text-white">
                    00.00
                </td>
                  <td class="px-6 py-4 dark:text-white">
                   00.00
                </td>
            </tr>
          
        </tbody>
    </table>
</div>

  <form wire:submit.prevent="selectCustomer" class="w-full mb-8">
    <div  wire:ignore>
        <label for="select2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tafuta Member</label>
        <select id="select2" wire:model="selectedCustomer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Tafuta Mwanachama</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"> {{ $customer->fname }} {{ $customer->lname }} ({{ $customer->nickname }})</option>
            @endforeach
        </select>
    </div>

</form>



@if($selectedCustomer)
<div class="relative overflow-x-auto mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

   
        <thead class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 border-b border-gray-200 shadow focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tarehe
                </th>
                <th scope="col" class="px-6 py-3">
                    Maelezo
                </th>
                <th scope="col" class="px-6 py-3">
                    Lipwa
                </th>
                <th scope="col" class="px-6 py-3">
                   Tolewa
                </th>
                 <th scope="col" class="px-6 py-3">
                   Salio 
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach( $deposits as $deposit)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                   {{$deposit->created_at}}
                </th>
               <td class="px-6 py-4 font-medium text-gray-900 uppercase dark:text-white whitespace-nowrap">
                  {{$deposit->desc}}
             </td>

                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                     {{ number_format($deposit->deposit, 2, '.', ',') }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ number_format($deposit->withdrawal, 2, '.', ',') }}
                </td>
                  <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ number_format($deposit->amount, 2, '.', ',') }}
                   
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
@else
<div class="relative overflow-x-auto mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

   
        <thead class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 border-b border-gray-200 shadow focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tarehe
                </th>
                <th scope="col" class="px-6 py-3">
                    Maelezo
                </th>
                <th scope="col" class="px-6 py-3">
                    Lipwa
                </th>
                <th scope="col" class="px-6 py-3">
                   Tolewa
                </th>
                 <th scope="col" class="px-6 py-3">
                   Salio 
                </th>
            </tr>
        </thead>
        <tbody>
        
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                   --/--/--
                </th>
               <td class="px-6 py-4 dark:text-white whitespace-nowrap">
                  -----
             </td>

                <td class="px-6 py-4 dark:text-white">
                    00.00
                </td>
                <td class="px-6 py-4 dark:text-white">
                    00.00
                </td>
                  <td class="px-6 py-4 dark:text-white">
                   00.00
                </td>
            </tr>
          
        </tbody>
    </table>
</div>
@endif

</div>
</div>
   <script>
    function initSelect2() {
        $('#select2').select2({
            placeholder: 'Tafuta Mwanachama',
            allowClear: true
        }).on('change', function (e) {
            @this.set('selectedCustomer', e.target.value);
            @this.selectCustomer(e.target.value);
        });
    }

    document.addEventListener('DOMContentLoaded', initSelect2);
    document.addEventListener('livewire:navigated', initSelect2);
</script>






