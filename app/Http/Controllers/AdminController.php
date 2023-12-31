<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;


class AdminController extends Controller
{

    function viewOrders(Request $request){ 
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    function updateOrderStatus(Request $request, $id){ 
        $order = Order::find($id);

        if ($order->status !== 'paid') {
            return back()->with('error', 'Order must be paid before status can be changed.');
        }

        if ($order) {
            $validatedData = $request->validate([
                'status' => 'required|string',
            ]);
    
            $order->status = $validatedData['status'];
            $order->save();

            return redirect()->route('admin.orders')->with('success', 'Order status updated!');
        }
        return redirect()->back()->with('error', 'Failed to update order status.');
    }
    
    public function cancelOrder($id){ 
        $order = Order::findOrFail($id);
        $order->status = 'Canceled';
        $order->delete();

        return redirect()->back()->with('success', 'Order canceled successfullyy');
    }
}