<?php

use App\Http\Controllers\UserController;
use App\Livewire\Massages;
use App\Livewire\Members;
use App\Livewire\Pages\Admins\Admins;
use App\Livewire\Pages\Admins\UsersCreate;
use App\Livewire\Pages\Members\Debts;
use App\Livewire\Pages\Members\Deposits;
use App\Livewire\Pages\Members\Member;
use App\Livewire\Pages\Members\Payments;
use App\Livewire\Pages\Members\Withdrawals;
use App\Livewire\Pages\Payments\Method;
use App\Livewire\Pages\Permission\UserPermission;
use App\Livewire\Pages\Roles\Roles;
use App\Livewire\Pages\Settings;
use Illuminate\Support\Facades\Route;



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::resource('users', UserController::class);

Route::get('users', Admins::class)
    ->middleware(['auth', Admins::class])
    ->name('users');


Route::get('users', UsersCreate::class)
    ->middleware(['auth', UsersCreate::class])
    ->name('usersCreate');

Route::get('members', Member::class)
    ->middleware(['auth', Member::class])
    ->name('members');

Route::get('payments', Payments::class)
    ->middleware(['auth', payments::class])
    ->name('payments');


Route::get('method', Method::class)
    ->middleware(['auth', Method::class])
    ->name('method');

Route::get('TodayDeposit', Deposits::class)
    ->middleware(['auth', Deposits::class])
    ->name('TodayDeposit');


Route::get('TodayWithdrawals', Withdrawals::class)
    ->middleware(['auth', Withdrawals::class])
    ->name('TodayWithdrawals');

Route::get('debts', Debts::class)
    ->middleware(['auth', Debts::class])
    ->name('debts');

Route::get('permission', UserPermission::class)
    ->middleware(['auth', UserPermission::class])
    ->name('permission');


Route::get('roles', Roles::class)
    ->middleware(['auth', Roles::class])
    ->name('roles');

Route::get('settings', Settings::class)
    ->middleware(['auth', Settings::class])
    ->name('settings');

Route::get('save', Settings::class)
    ->middleware(['auth', Settings::class])
    ->name('save');
Route::get('GroupSms', Massages::class)
    ->middleware(['auth', Massages::class])
    ->name('GroupSms');




Route::get('admins', Admins::class)
    ->middleware(['auth', Admins::class])
    ->name('admins');




require __DIR__ . '/auth.php';
