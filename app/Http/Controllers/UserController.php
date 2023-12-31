<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class UserController extends Controller
{

    public function createOrder(Request $request){ 
        $request->validate([
            'menu_id' => 'required|string|max:255',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'food_name' => $menu->name,
            'price' => $menu->price,
        ]);

        if($order) {
            return redirect()->route('user.order.status')->with('success', 'Order berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal');
        }
    }    
}
