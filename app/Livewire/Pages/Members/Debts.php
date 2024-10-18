<?php

namespace App\Livewire\Pages\Members;

use App\Models\Customer;
use App\Models\Receive;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Debts extends Component
{

    public $sumOfLatestNegatives;

    public function mount()
    {

// Step 1: Get the latest negative transaction for each customer
$latestNegatives = Receive::select('customer_id', DB::raw('MAX(created_at) as latest_at'))
->where('amount', '<', 0) // Only consider negative amounts
->groupBy('customer_id')
->pluck('latest_at', 'customer_id');

// Step 2: Get customers with their latest negative transactions
$customersWithLatestNegative = Customer::with(['receives' => function($query) use ($latestNegatives) {
    $query->where('amount', '<', 0)
          ->whereIn('created_at', $latestNegatives) // Filter to get only the latest negative transaction
          ->orderBy('created_at', 'desc'); // Order by date
}])
->has('receives') // Ensure we only get customers with negative transactions
->select('id', 'fname') // Select necessary fields
->get()
->map(function ($customer) {
    // Get the latest negative transaction for each customer
    $customer->latest_negative = $customer->receives->first(); // Get the first (latest) negative amount

    
    return $customer;
});

// Step 3: Sum the amounts of the latest negative transactions
$sumOfLatestNegatives = $customersWithLatestNegative->sum(function ($customer) {
    
return $customer->latest_negative ? $customer->latest_negative->amount : 0; // Sum only if there is a latest negative
});

// Optionally, if you want to store the total sum of negative amounts separately
$this->negativeSum = $sumOfLatestNegatives;
    }
    public function render()
    {
        return view('livewire.pages.members.debts');
    }
}
