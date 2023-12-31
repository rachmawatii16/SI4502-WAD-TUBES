<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class AdminController extends Controller
{
    public function showPayments()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }

    public function editPayment($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payments.edit', compact('payment'));
    }

    public function updatePayment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validatedData);

        return redirect()->route('admin.payments')->with('success', 'Payment updated successfully.');
    }

    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Payment deleted successfully.');
    }
}
