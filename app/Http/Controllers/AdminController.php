<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\Feedback;
use App\Models\Payment;

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
        return redirect()->back()->with('error', 'Error !!');
    }

    function update(Request $request, $id){ 
        $user = User::find($id);
        if ($user){
            $user->name = $request->name;
            $user->role = $request->role;
            $user->save();
            return redirect()->route('admin.home')->with('success', 'User telah berhasil diupdate');
        }
        return redirect()->route('admin.home')->with('error', 'Gagal');
    }

    function edit($id){ 
        $user = User::find($id);
        if ($user) {
            return view('admin.edit', compact('user'));
        }
        return redirect()->back()->with('error', 'Gagal');
    }

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

    public function showMenuForm(){ 
        $tenants = Tenant::all();
        return view('admin.menu_form', compact('tenants'));
    }

        public function storeMenu(Request $request){ 
            $request->validate([
                'tenant_id' => 'required|exists:tenants,id',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $menu = new Menu($request->only(['tenant_id', 'name', 'description', 'price'])); 

            if ($request->hasFile('image')) { 
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/menus'), $imageName);
                $menu->image = 'images/menus/'.$imageName;
            }

            $menu->save(); 

        return redirect()->route('admin.menu.create')->with('success', 'Menu item created successfully.');
    }

    public function cancelOrder($id){ 
        $order = Order::findOrFail($id);
        $order->status = 'Canceled';
        $order->delete();

        return redirect()->back()->with('success', 'Order canceled successfullyy');
    }

    public function viewFeedback(){ 
        $feedbacks = Feedback::with('order')->latest()->get();
        return view('admin.view_feedback', compact('feedbacks'));
    }

    public function deleteFeedback($id){
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
    
        return redirect()->back()->with('success', 'Feedback deleted successfully.');
    }

    public function showTenants()
    {
        $tenants = Tenant::all();
        return view('admin.list-tenants', compact('tenants'));
    }

    public function createTenant()
    {
        return view('admin.add-tenants');
    }

    public function storeTenant(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:12'
        ]);

        Tenant::create($validatedData);

        return redirect()->route('admin.tenants')->with('success', 'Tenant added successfully.');
    }

    public function editTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('admin.edit-tenants', compact('tenant'));
    }

    public function updateTenant(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:12'
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update($validatedData);

        return redirect()->route('admin.tenants')->with('success', 'Tenant updated successfully.');
    }

    public function deleteTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('admin.tenants')->with('success', 'Tenant deleted successfully.');
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();

        return view('admin.edit-order', compact('order', 'users'));
    }

    public function updateOrder(Request $request, $id)
    {
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'food_name' => 'required|string',
        'status' => 'required|string',
    ]);

    $order = Order::findOrFail($id);
    $order->update($validatedData);

    return redirect()->route('admin.orders')->with('success', 'Order updated successfully.');
    }

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
