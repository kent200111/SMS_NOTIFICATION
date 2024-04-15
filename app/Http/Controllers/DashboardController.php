<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;

        if ($usertype == 'user') {
            return view('home');
        } elseif ($usertype == 'admin' || $usertype == 'super_admin') {
            return view('admin_dashboard.adminhome');
        } else {
            return redirect()->back();
        }
    } else {
        return redirect()->route('login'); // Redirect to login page if user is not authenticated
    }
}

    public function showAdminHome()
    {
        $posts = Post::orderBy('created_at', 'desc')->get(); // Retrieve posts, adjust as per your needs
    
        return view('home', compact('posts'));
    }  
}