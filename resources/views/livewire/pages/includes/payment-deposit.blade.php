
<div>
<!-- Button to open the modal -->


<x-primary-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'withdrawal')"
>
    {{ __('Toa') }}
</x-primary-button>



 <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('weka') }}</x-danger-button>


   


    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
    <div class="p-4  bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class=" text-xl font-semibold dark:text-white">Deposit Modal</h3>
            <form wire:click.prevent='save'>
                <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kiasi</label>
    <input 
        type="text" 
        wire:model.lazy="deposit" 
        name="amount" 
        id="amount"
        x-data="{ inputValue: @entangle('deposit').defer }"
        x-mask:dynamic="$money($input)" 
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="" 
        required>
    
    @error('deposit') 
        <span class="text-red-500">{{ $message }}</span> 
    @enderror
</div>


                    <div class="col-span-6 sm:col-span-3">
                        <label for="deposit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jina la Mlipaji</label>
                        <select 
                                wire:model="payment_id" 
                                id="payment_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            >
                                <option value="">Chagua Malipo</option>
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                            </select>
                         
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <label for="deposit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jina la Mlipaji</label>
                        <input type="text" 
                         wire:model="payer" 
                          name="deposit" 
                          id="deposit"
                          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                          placeholder="" required>
                          @error('payer') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                   
                    
                   
                    <div class="col-span-6 sm:col-full">
                        <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Save all</button>
                    </div>

                    <div class="col-span-6 sm:col-full"">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
                </div>
            </form>
        </div>
    </x-modal>

<!-- Modal -->
<x-modal name="Deposit" :show="$errors->isNotEmpty()" focusable>
    <div class="flex items-center justify-center ">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ __('Deposit Form') }}
                </h3>
            </div>

            <!-- Horizontal Line -->
        

            <div class="px-6 py-4">
                <form wire:click.prevent='save'>
                    <div class="grid gap-4  sm:grid-cols-2">
                        <!-- Deposit Input -->
                        <div>
                            <label for="deposit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kiasi</label>
                            <input 
                                wire:model="deposit" 
                                type="text" 
                                name="amount" 
                                id="deposit" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                required
                            >
                            @error('deposit') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Payer Input -->
                        <div>
                            <label for="payer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jina La Mlipaji</label>
                            <input 
                                wire:model="payer" 
                                type="text" 
                                name="payer" 
                                id="payer" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                required
                            >
                            @error('payer') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Payment Type Select -->
                        <div>
                            <label for="payment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Type</label>
                            <select 
                                wire:model="payment_id" 
                                id="payment_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            >
                                <option value="">Chagua Malipo</option>
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Total Amount Input -->
                        <div>
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount</label>
                            <input 
                                type="text" 
                                wire:model="amount" 
                                id="amount" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                readonly
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    >
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Hifadhi
                    </button>
                </form>
            </div>

            <!-- Close Button -->
            <div class="mt-6 px-6 py-4 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </div>
    </div>
</x-modal>
<div>