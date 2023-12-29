<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function home(){
        $users = User::all();
        return view('admin.home', compact('users'));
    }

    function delete($id){
        $users = User::find($id);
        if ($users){
            $users->delete();
            return redirect()->back()->with('success', 'User telah berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Error!!');
    }

    function updateOrderStatus(Request $request, $id){
        $order = Order::find($id);
        if ($order) {   
            $validatedData = $request->validate([
                'status' => 'required|string',
            ]);
    
            $order->status = $validatedData['status'];
            $order->save();

            return redirect()->route('admin.orders')->with('success', 'Status pesanan telah diperbaharui!');
        }
        return redirect()->back()->with('error', 'Pembaharuan Status Pesanan Gagal');
    }

    function viewOrders(Request $request){
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders', compact('orders'));
    }
    
}
