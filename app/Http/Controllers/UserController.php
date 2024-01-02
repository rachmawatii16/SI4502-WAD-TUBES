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
    function home(){
        return view('user.home');
    }

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
            $order->delete();
            return redirect()->route('user.order.status')->with('success', 'Order confirmed and deleted successfully.');
        }

        return redirect()->route('user.order.status')->with('error', 'Unable to confirm order.');
    }

    public function showTenants(){ 
        $tenants = Tenant::all();
        return view('user.choose_tenants', compact('tenants'));
    }

    public function showTenantMenu($tenantId){ 
        $menuItems = Menu::where('tenant_id', $tenantId)->get(); 
        $tenant = Tenant::findOrFail($tenantId); 
        return view('user.tenant_menu', compact('menuItems', 'tenant'));

    }

    public function createOrUpdateMenu(Request $request, $menuId = null){ 
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($menuId) {
            $menu = Menu::findOrFail($menuId);
        } else {
            $menu = new Menu();
        }

        //Ini buat setup menu nya
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price; 

        //Ini tuh logic buat file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/menus'), $imageName);
            $menu->image = 'images/menus/'.$imageName;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu item saved successfully.');
    }

    public function showPayment(){
        $user = auth()->user();
        $orders = $user->orders()->where('status', 'pending')->get();
    
        \Log::info('Orders:', $orders->toArray());
        $totalPrice = $orders->sum('price');
    
        \Log::info('Total Price:', ['totalPrice' => $totalPrice]);

        return view('user.payment', compact('totalPrice'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);
    
        $order = Order::findOrFail($orderId);
    
        Payment::create([
            'order_id' => $orderId,
            'amount' => $validatedData['amount'],
            'status' => 'paid',
            'payment_method' => $validatedData['payment_method'],
        ]);
    
        $order->status = 'paid';
        $order->save();
    
        return redirect()->route('user.order.status')->with('success', 'Payment successful.');

    }
    public function showPaymentPage($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('user.payment', compact('order'));
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
