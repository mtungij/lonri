<?php

namespace App\Livewire\Pages\Members;


use App\Models\Receive;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Deposits extends Component
{
    public string $search = '';
    

    public $todayDeposit;

    public function mount()
    {
        $this->todayDeposit=Receive::whereDate('created_at',Carbon::today())->sum('deposit');


    }

    public function delete($id)
    {
         $deposit = Receive::find($id)->delete('deposit');

         if( $deposit)
         {
            Toaster::success('payment deleted successfully');
         }

      
    }

    public function sendsms($phone, $message)
    {
        $api_key = 'gG1FSMH1SvFWGutz7XukCSu9.n'; 
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://galadove.mikoposoft.com/api/v1/receive/action/send/sms");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'apiKey' => $api_key,
            'phoneNumber' => $phone,
            'messageContent' => $message
        ]));
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
    
        return $server_output;
    }


    #[Computed]
    public function payments()
    {
        return Receive::whereDate('created_at',now()->format('Y-m-d'))
                        ->with(['customer','user','payment'])
                        ->whereRelation('customer', 'fname', 'LIKE', "%{$this->search}%")
                        ->get();
    }
    
    public function render()
    {
        return view('livewire.pages.deposits',[ "todayDeposit" => $this->todayDeposit,
    ]);
    }
}
