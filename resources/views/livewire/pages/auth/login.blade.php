<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>







<main class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <!-- <a href="../../index.html" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="../../images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
        <span>Flowbite</span>  
    </a> -->
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Sign in to platform 
        </h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login" class="mt-8 space-y-6" action="#">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" wire:model="form.email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@gmail.com" required>
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" wire:model="form.password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>
            <div class="flex items-start">
                
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">Lost Password?</a>
                @endif
            </div>
            <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login to your account</button>
           
        </form>
    </div>
</div>

</main>







