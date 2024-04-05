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

        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='admin')
            {
                return view('admin_dashboard.adminhome');
            }

            else if($usertype== 'user')
            {
                return view('home');
            }

            else
            {
                return redirect()->back();
            }
        }
    }

        public function showAdminHome()
        {
            $posts = Post::orderBy('created_at', 'desc')->get(); // Retrieve posts, adjust as per your needs
        
            return view('admin_dashboard.adminhome', compact('posts'));
        }  
}