<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Carbon\Carbon; 
use Masmerise\Toaster\Toaster;
class Massages extends Component
{

    public $sms;

    protected $rules = [
        'sms' => 'required',
    ];
    

   

    public function sendsms($phone, $message)
{
    $api_key = 'Kad9LxbWcMWzoSUZrYeiu8v5uM'; // Your API key

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://galadove.loan-pocket.com//api/v1/receive/action/send/sms");
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

public function sendBulkSms()
{
    // Validate the message input
    $this->validate();

    // Get all customers
    $members = Customer::all();

    // Get the current time in the desired format
    $currentTime = Carbon::now()->format('H:i'); // Example: "14:30"

    // Loop through all customers and send the SMS
    foreach ($members as $member) {
        // Construct the message with the customer's first name, custom message, and time
        $message = "Ndugu {$member->fname}, {$this->sms}.";
        $this->sendsms($member->phone, $message);
    }
    Toaster::success('Messages sent successfully!');
   
}
       

      
    

    public function render()
    {
        return view('livewire.massages');
    }
}
