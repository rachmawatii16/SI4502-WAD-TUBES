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
}
