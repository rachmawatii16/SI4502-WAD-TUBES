<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Menu;

class AdminController extends Controller
{

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
}
