<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class UserController extends Controller
{

    public function viewOrderStatus(){ //kalo ini buat ngeliat status ordernya
        $user = auth()->user();
        $orders = $user->orders()->with('menu')->latest()->get();
        return view('user.order_status', compact('orders'));
    }

    public function confirmReceived($orderId) //kalo ini buat konfirmasi orderannya jadi kalo statusnya udah arrived gitu bisa di konfirmasi sama usernya
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', auth()->user()->id)
                      ->first();

        if ($order && $order->status == 'Food Arrived') { //ini diangejelasin kalo attribute status di table order udah jadi food arrived dia ngedelete orderan itu dari table
            $order->delete();
            return redirect()->route('user.order.status')->with('success', 'Order confirmed and deleted successfully.');
        }

        return redirect()->route('user.order.status')->with('error', 'Unable to confirm order.');
    }
}
