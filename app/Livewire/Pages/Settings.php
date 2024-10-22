<?php

namespace App\Livewire\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Settings extends Component
{
    use WithFileUploads;
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public ?string $img = null;

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');
        Toaster::success('Umefanikiwa kubadilisha Password');
        $this->dispatch('password-updated');
    }

    public function save()
    {
        // Validate the image
        $this->validate([
            'img' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        $user = Auth::user();
    
        // Check if a new image has been uploaded
        if ($this->img) {
            // Delete the old image if it exists
            if ($user->img) {
                // Delete the old image from storage
                Storage::disk('public')->delete($user->img);
            }
    
            // Store the image and update user model
            $path = $this->img->store('passports', 'public');
            $user->img = $path; // Update the img property
    
            // Save the user record (only if an image was updated)
            $user->save();
    
            // Show success message
            Toaster::success('Profile picture updated successfully!');
    
            // Reset the img property to avoid multiple uploads
            $this->img = null; 
        }
    }
    
    


    public function render()
    {
        return view('livewire.pages.settings');
    }
}






