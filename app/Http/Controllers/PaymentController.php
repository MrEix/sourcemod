<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        Payment::query()->create([
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'description' => 'Пополнение счета Free-Kassa',
        ]);
    }
}
