<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class UserController extends Controller
{

    public function viewOrderStatus(){ 
        $user = auth()->user();
        $orders = $user->orders()->with('menu')->latest()->get();
        return view('user.order_status', compact('orders'));
    }

    public function confirmReceived($orderId) 
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', auth()->user()->id)
                      ->first();

        if ($order && $order->status == 'Food Arrived') { 
            return redirect()->route('user.order.status')->with('success', 'Order confirmed and deleted successfully.');
        }

        return redirect()->route('user.order.status')->with('error', 'Unable to confirm order.');
    }
}
