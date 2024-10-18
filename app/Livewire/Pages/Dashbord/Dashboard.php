<?php

namespace App\Livewire\Pages\Dashbord;

use App\Models\Customer;
use App\Models\Receive;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $TotalWithdrawal;

    public $Todaywithdrawal;


    public $TodayProfit;

    public $TotalProfit;


    public $TotalAmount;


    public $negative;


    public $NumberDepositors;

    public $NumberWithdrawals;

    public $TotalMembers;

    public $GenderMale;

    public $GenderFemale;

    public $OverFive;

    public $BelowFive;

    public $CustomerOverFive;

    public $CustomerBelowfive;


    public $todayDeposit;

   

    public function mount()
    {

        $this->NumberDepositors = Receive::whereDate("created_at", Carbon::today())
        ->whereNotNull("deposit")
         ->distinct("customer_id")
         ->count("customer_id");
 
 
         $this->NumberWithdrawals = Receive::whereDate("created_at", Carbon::today())
         ->whereNotNull("withdrawal")
         ->distinct("customer_id")
         ->count("customer_id");
 
 
         $this->TotalMembers= Customer::count();
 
         $this->GenderMale =Customer::where("gender" , "mwanaume")->count();
         $this->GenderFemale = Customer::where("gender","mwanamke")->count();
 



        $this->Todaywithdrawal = Receive::whereDate('created_at', Carbon::today())->sum('withdrawal');

        $this->TodayProfit=Receive::whereDate('created_at',Carbon::today())->sum('profit');

        $this->totalWithdrawal=Receive::sum('withdrawal');

        $this->todayDeposit=Receive::whereDate('created_at',Carbon::today())->sum('deposit');

        $this->TotalProfit=Receive::sum('profit');

        $latestBalances = Receive::select('customer_id', DB::raw('MAX(created_at) as latest_at'))
                                ->groupBy('customer_id')
                                ->pluck('latest_at', 'customer_id');

        $latestBalancesSum = Receive::whereIn('created_at', $latestBalances)
                                ->sum('amount');

        $this->TotalAmount = $latestBalancesSum;
           
        // dd( $this->TotalAmount);

        $negative = Receive::select('customer_id', DB::raw('MAX(created_at) as latest_at'))
        ->groupBy('customer_id')
        ->pluck('latest_at', 'customer_id');

        $nega = Receive::where('amount', '<',0)->whereIn('created_at', $negative )
        ->sum('amount');

        $this->negative = abs($nega);

        // dd($nega);
    }

    public function render()
    {
        return view('livewire.pages.dashbord.dashboard');
    }
}
