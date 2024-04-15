<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'super_admin') {
                // Redirect super admins to a different page or perform other actions
                return view('super_admin_dashboard');
            } elseif ($usertype == 'admin') {
                return view('admin_dashboard.adminhome');
            } elseif ($usertype == 'user') {
                return view('home');
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
    
        return view('admin_dashboard.adminhome', compact('posts'));
    }  
}