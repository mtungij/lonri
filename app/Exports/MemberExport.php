<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
    public function view(): View
    {
        return view('members', [
            'members' => Customer::all()
        ]);
    }
}