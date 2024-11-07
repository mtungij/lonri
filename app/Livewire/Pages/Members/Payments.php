<?php
namespace App\Livewire\Pages\Members;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Receive;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Url;

class Payments extends Component 
{
    

    public $fname;
    public $lname;
   
    public $nickname;

    public $gender;

    public $phone;

    public $amount;

    
    public $payer;

    public $customer_id;

    public $payment_id;
    public $user_id;

    public $desc;

    public $deposit;

    public $currentCustomer;   
    
    public $withdrawal;

    public $profit = 0;

    #[Url]
    public $selectedCustomer;
    public $customers = [];
    public $customerDetails = [];

    public $benefitDesc;
   
    protected $rules = [
        
        'payer' => 'required|string|max:255',
        'payment_id' => 'required|exists:payments,id',
        'deposit' => 'required|string',
    ];

    
    public function save()
    {
       
       $validated =$this->validate();
       $this->deposit = str_replace(',', '', $this->deposit);

    
       $payment=Payment::find($this->payment_id);

       
     

       $currentAmount = Receive::where('customer_id', $this->selectedCustomer)
       ->orderBy('id', 'desc')
       ->value('amount');

       $newAmount = $currentAmount + $this->deposit;

     

      $desc = "{$this->payer}/deposit/{$payment->name}";

       Receive::create([
        'user_id' => auth()->id(),
        'customer_id' => $this->selectedCustomer,
        'amount' => $newAmount,
        'deposit' => $this->deposit,
        'payer' => $this->payer,
        'desc' => $desc,
        'payment_id' => $this->payment_id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

   

    $date = now()->format('d-m-Y H:i:s');
    $message = "Ahsante Ndugu {$this->currentCustomer->fname} Mchango wako wa Tsh {$this->deposit} umepokelewa Chawote Group leo {$date} kwa maelezo zaidi 0683250019";
    $phone = $this->currentCustomer->phone; 

    $this->sendsms($phone, $message);
    
        Toaster::success('Malipo yamefanyika kikamilifu.');

        $this->reset();
    }

    public function withdraw()
    {
        $validated = $this->validate([
            'payer' => 'required|string|max:255',
            'payment_id' => 'required|exists:payments,id',
            'profit' => 'sometimes|numeric',
            'withdrawal' => 'required|string|min:0',
        ]);

        $this->withdrawal = str_replace(',' , '' , $this->withdrawal );
        $payment = Payment::find($this->payment_id);

        $desc = "{$this->payer}/cash withdrawal/{$payment->name}";

        $benefitDesc = "{$this->payer}/faida";

        $currentAmount = Receive::where('customer_id', $this->selectedCustomer)->sum('amount');
        $currentAmount = Receive::where('customer_id', $this->selectedCustomer)
        ->orderBy('id', 'desc')
        ->value('amount');

       
        $newAmount = $currentAmount - $this->withdrawal - $this->profit;

        

        Receive::create([
            'user_id' => auth()->id(),
            'customer_id' => $this->selectedCustomer,
            'amount' => $newAmount,
            'payer' =>$this->payer,
            'profit' => $this->profit,
            ' benefitDesc' => $benefitDesc,
            'payment_id' => $this->payment_id,
            'withdrawal' => $this->withdrawal,
            'desc' => $desc,
        ]);

        $date= date('d-m-Y');
        $message = "Ndugu {$this->currentCustomer->fname}  {$date} umetoa  Tsh ". number_format($this->withdrawal)." Chawote Group Kwa maelezo zaidi +255683250019  .";
        $phone = $this->currentCustomer->phone; 
        $this->sendsms($phone,$message);

        Toaster::success('Withdrawal successfully recorded.');

        $this->reset(['amount', 'payer', 'withdrawal', 'payment_id']);
    }



    public function mount()
    {
        // Fetch initial list of customers
        $this->customers = Customer::all(); // Adjust as needed
        $this->customerDetails = []; // Initialize as empty array
        if ($this->selectedCustomer) {
            $customer = Customer::find($this->selectedCustomer);
            $this->currentCustomer = $customer;
        } 
    }

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


    

   

    public function selectCustomer()
    {
        if ($this->selectedCustomer) {
            $customer = Customer::find($this->selectedCustomer);
            $this->currentCustomer = $customer;

            $this->dispatch('customer-changed');

        } 
    }


   
    
    

    public function render()
    {
    
        $deposits = $this->selectedCustomer ? Receive::where('customer_id', $this->selectedCustomer)->orderBy('created_at','desc')->get() : collect([]);
       $payments=Payment::all();
        return view('livewire.pages.payments',['payments' => $payments , 'deposits' => $deposits]);
    }
}
