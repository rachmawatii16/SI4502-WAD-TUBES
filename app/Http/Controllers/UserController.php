<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    function home(){
        return view('user.home');
    }

    public function showPayment(){
        $user = auth()->user();
        $orders = $user->orders()->where('status', 'pending')->get();
    
        \Log::info('Orders:', $orders->toArray());
        $totalPrice = $orders->sum('price');
    
        \Log::info('Total Price:', ['totalPrice' => $totalPrice]);

        return view('user.payment', compact('totalPrice'));
    }

    public function processPayment(Request $request){
        $user = auth()->user();
        $user->orders()->where('status', 'pending')->update(['status' => 'paid']);

        return redirect()->route('user.order.status')->with('success', 'Payment successful.');
    }
}