<div>
<div class="w-full p-4 pt-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Info</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-2 sm:py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/diversity.png') }}" alt="Diversity">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate uppercase dark:text-white">
                            Jumla ya Wanachama
                        </p>
                        <p class="text-sm font-serif font-thin text-blue-500 truncate dark:text-green-400">
                            Wanaume:{{$this->GenderMale}} wanawake:{{$this->GenderFemale}}
                        </p>
                        
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                       {{$this->TotalMembers}}
                    </div>
                </div>
            </li>
            <li class="py-2 sm:py-4">
                <div class="flex items-center ">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{asset('assets/money.png')}}" alt="money">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate uppercase dark:text-white">
                           Walioweka Leo
                        </p>
                        
                      
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        {{$this->NumberDepositors}}
                    </div>
                </div>
            </li>
            <li class="py-2 sm:py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{asset('assets/deposit.png')}}" alt="deposit">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 uppercase truncate dark:text-white">
                            Waliotoa Akiba Leo
                        </p>

                       
                       
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        {{$this->NumberWithdrawals}}
                    </div>
                </div>
            </li>
           
          
        </ul>
   </div>
</div>


<div class="items-center justify-between mt-3 p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-white">Jumla Ya Balance</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format($this->TotalAmount)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
             
            </span>
            
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>



<div class="items-center justify-between mt-3 p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-white">Today Deposit</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format( $this->todayDeposit)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
             
            </span>
            
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>


      <div class="items-center justify-between mt-3 p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-white">Madeni</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format($this->negative)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
             
            </span>
            
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>


<div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-bold text-gray-500 uppercase dark:text-white">Today Withdrawal</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format($this->Todaywithdrawal)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
             
            </span>
            
          </p>
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Today Profit</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format( $this->TodayProfit)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              
            </span>
           
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
     
    </div>

    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-bold text-gray-500 uppercase dark:text-white">Total Withdrawal</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format($this->totalWithdrawal)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
             
            </span>
            
          </p>
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Profit</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{number_format($this->TotalProfit)}}</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              
            </span>
           
          </p>
        </div>
        <div class="w-full" id="week-signups-chart"></div>
      </div>
     
    </div>

  

 
</div>
