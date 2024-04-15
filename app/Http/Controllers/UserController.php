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

public function indexAdmin()
{
    $users = User::where('usertype', 'admin')->paginate();

    return view('admin.index', compact('users'));
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    // Redirect back or to any other page after deletion
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}

}