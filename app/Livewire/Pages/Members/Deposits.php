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

   public function sendsms($phone,$massage){
    //public function sendsms(){f
    //$phone = '255628323760';
    //$massage = 'mapenzi yanauwa';
    // $api_key = '';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    //$api_key = 'qFzd89PXu1e/DuwbwxOE5uUBn6';
    //$curl = curl_init();
    $url = "https://sms-api.kadolab.com/api/send-sms";
    $token = getenv('SMS_TOKEN');

  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Authorization: Bearer '. $token,
      'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      "phoneNumbers" => ["+$phone"],
      "message" => $massage
    ]));
  
  $server_output = curl_exec($ch);
  curl_close ($ch);
  
  //print_r($server_output);
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
