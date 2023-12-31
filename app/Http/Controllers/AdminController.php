<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Feedback;


class AdminController extends Controller
{
    function home(){ //ini mah cuma ngambil data dari User trus dia ngereturn view ke home nya admin
        $users = User::all();
        return view('admin.home', compact('users'));
    }

    
    public function viewFeedback(){ // ini buat liat feedback dari sisi admin
        $feedbacks = Feedback::with('order')->latest()->get();
        return view('admin.view_feedback', compact('feedbacks'));
    }

    public function deleteFeedback($id){
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
    
        return redirect()->back()->with('success', 'Feedback deleted successfully.');
    }

}