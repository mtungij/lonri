<?php

namespace App\Livewire\Pages\Admins;

use App\Models\User;
use Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class UsersCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $position;
    public $img;
    public $phone;
    public $password_confirmation;

    public function register()
    {
        // Check if email already exists in the database
        if (User::where('email', $this->email)->exists()) {
    
            Toaster::error('email uliojaza tayari ina mtumiaji hivyo haiwezi kusajiliwa tena');
            return;
        }

        // Validation rules
        $validated = $this->validate([
            "name" => ["required", "string", "max:255"],
            "phone" => ["required", "numeric"],
            "email" => ["required", "string", "lowercase", "email", "unique:users,email"],
            "password" => ["required", "string", "confirmed", Rules\Password::defaults()],
            "position" => ["required", "string"],
            "img" => ["nullable", "image", "max:1024"], // max size 1MB
        ]);

        // Handle file upload if an image is uploaded
        if ($this->img) {
            $validated['img'] = $this->img->store('uploads', 'public');
        }

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

        // Create the user
        User::create($validated);

        // Flash success message

        return redirect()->route('admins', $this->name)->with('success', Toaster::success('umefanikiwa kusajili staff kikamilifu'));
        // Optionally, reset form fields after success
       
    }

    public function render()
    {
        return view('livewire.pages.admins.users-create');
    }
}
