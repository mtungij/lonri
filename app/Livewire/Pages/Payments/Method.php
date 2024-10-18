<?php

namespace App\Livewire\Pages\Payments;

use App\Models\Payment;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
class Method extends Component
{

    public $name;

    public function save()
{
   
   $this->validate([
    'name' => 'required|string|max:255',
]);


$existingPayment = Payment::where('name', $this->name)->first();

if ($existingPayment) {
   
    session()->flash('message', 'Payment method already exists: ' );

    Toaster::error(' Njia ya malipo unayosajili  ' . $this->name. ' tayari ipo kwenye mfumo'); // 👈
    return;
}


Payment::create([
    'name' => $this->name,
]);


$this->name = '';
Toaster::success('usajili wa Njia ya malipo umefanikiwa kikamilifu'); // 👈
}
    public function render()
    {
        $payments = Payment::all();
        return view('livewire.pages.method',['payments' => $payments]);
    }
}
