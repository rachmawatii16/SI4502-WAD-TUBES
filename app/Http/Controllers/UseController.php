<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    
    public function createOrUpdateMenu(Request $request, $menuId = null){ //nah disini dia buat ngeupdate menu dari table menus
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

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/menus'), $imageName);
            $menu->image = 'images/menus/'.$imageName;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu item saved successfully.');
    }
}
