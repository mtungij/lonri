<?php

namespace App\Livewire\Pages\Permission;

use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPermission extends Component
{
    public $name;

    public function save()
    {


        $existing = Permission::where("name", $this->name)->first();  

        if ($existing) {
            Toaster::error('Permmission Already Exist');
        }  

        $validated = $this->validate([
            "name"=> ["required","string","max:255"],
        ]);


        Permission::create([
            'name' => $validated['name'],
        ]);

        Toaster::success('Permmission Created successfully');
    }
    public function render()
    {    $permmision =Permission::all();
        return view('livewire.pages.permission.permission',['permission'=> $permmision]);
    }
}
