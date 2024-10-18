<?php

namespace App\Livewire\Pages\Roles;

use Livewire\Component;

use Masmerise\Toaster\Toaster;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{

    public $name;


    public function save()
    {
        $existing = Role::where("name", $this->name)->first();  

        if ($existing) {
            Toaster::error('Role Already Exist');
        }  
        
        $validated = $this->validate([
            "name"=> ["required","string","max:255"],
        ]);


        Role::create([
            'name' => $validated['name'],
        ]);

        Toaster::success('Role Created successfully');
    }
    public function render()
    {
        $roles = Role::paginate(10);
        return view('livewire.pages.roles.roles',['roles' => $roles]);
    }
}
