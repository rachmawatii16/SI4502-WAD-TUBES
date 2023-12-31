<?php

namespace App\Http\Controllers;

use App\Models\Tenant;

class UserController extends Controller
{

    public function showTenants(){ 
        $tenants = Tenant::all();
        return view('user.choose_tenants', compact('tenants'));
    }

    public function showTenantMenu($tenantId){ 
        $menuItems = Menu::where('tenant_id', $tenantId)->get(); 
        $tenant = Tenant::findOrFail($tenantId); 
        return view('user.tenant_menu', compact('menuItems', 'tenant'));

    }
}
