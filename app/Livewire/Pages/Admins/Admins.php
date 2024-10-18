<?php

namespace App\Livewire\Pages\Admins;

use App\Models\User;
use Livewire\Component;

class Admins extends Component
{

    
    public function render()
    {
        $admins = User::orderBy('created_at', 'desc')->get();
return view('livewire.pages.admins.admins', ['admins' => $admins]);

    }
}
