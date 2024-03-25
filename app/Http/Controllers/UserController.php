<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::where('usertype', 'user')->paginate();

    return view('users.index', compact('users'));
}

}