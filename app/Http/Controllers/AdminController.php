<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Tenant;

class AdminController extends Controller
{

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
}