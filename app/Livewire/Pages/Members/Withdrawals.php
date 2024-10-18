<?php

namespace App\Livewire\Pages\Members;

use App\Models\Receive;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toast;
use Masmerise\Toaster\Toaster;

class Withdrawals extends Component
{

    public $search;

    public $todayWithdrawal;

    public $startDate;
    public $endDate;
    public $profit;

    public function mount()
    {
        $this->todayWithdrawal=Receive::whereDate('created_at' , Carbon::today())->sum('withdrawal');

        $this->profit=Receive::whereDate('created_at', Carbon::today())->sum('profit');


        $this->startDate = Carbon::today()->toDateString();
        $this->endDate = Carbon::today()->toDateString();
    }


    public function delete($id)
    {
        
        $withdrawal =Receive::find($id)->delete('withdrawal');

        if($withdrawal) {
            Toaster::success('umefanikiwa kufuta malipo');
        }
    }

#[Computed]
    public function payments()
    {

        return Receive::whereDate('created_at',now()->format('Y-m-d'))->with(['customer','user'])->whereRelation('customer','fname','LIKE', "%{$this->search}%")->get();


       
    }

    
    public function render()
    {

        return view('livewire.pages.withdrawals',['todaywithdrawal'=> $this->payments()]);
    }
}
