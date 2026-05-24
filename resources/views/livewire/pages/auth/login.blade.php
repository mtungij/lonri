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

<div class="relative min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/lonri1.png') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/55 via-cyan-900/35 to-slate-950/60"></div>

    <div class="relative mx-auto flex min-h-screen w-full max-w-5xl items-center justify-center px-4 py-10">
        <div class="w-full max-w-md rounded-2xl border border-cyan-500/30 bg-black/80 p-7 text-white shadow-[0_20px_60px_rgba(8,145,178,0.25)] backdrop-blur-md sm:p-9">
            <div class="mb-6 text-center">
                <img src="{{ asset('assets/lonri.png') }}" alt="Lonri Logo" class="mx-auto h-14 w-auto" />
                <h1 class="mt-4 text-2xl font-semibold tracking-tight text-white">Welcome back</h1>
                <p class="mt-1 text-sm text-white/85">Sign in to continue to Lonri</p>
            </div>

            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <form wire:submit="login" class="space-y-4" action="#">
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-white">Email address</label>
                    <input type="email" wire:model="form.email" name="email" id="email"
                        class="block w-full rounded-xl border border-cyan-500/40 bg-black/45 p-3 text-white outline-none placeholder:text-white/55 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400"
                        placeholder="you@example.com" required />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-white">Password</label>
                    <input type="password" wire:model="form.password" name="password" id="password"
                        placeholder="••••••••"
                        class="block w-full rounded-xl border border-cyan-500/40 bg-black/45 p-3 text-white outline-none placeholder:text-white/55 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400"
                        required />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <button type="submit"
                    style="background-color: #06b6d4;"
                    class="mt-2 w-full rounded-xl px-5 py-3 text-sm font-semibold text-white transition hover:opacity-90 focus:outline-none focus:ring-4 focus:ring-cyan-300">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</div>

     











