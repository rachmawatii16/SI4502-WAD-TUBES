<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    function home(){
        return view('user.home');
    }

    public function showFeedbackForm($id){
        $order = Order::findOrFail($id);
        return view('user.feedback_form', compact('order'));
    }

    public function submitFeedback(Request $request, $id){
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);
    
        $order = Order::findOrFail($id);
    
        Feedback::create([
            'order_number' => $order->order_number,
            'food_name' => $order->food_name,
            'content' => $validatedData['content'],
        ]);
    
        $order->delete();
    
        return redirect()->route('user.order.status')->with('success', 'Feedback submitted successfully. Order deleted.');
    }
}
