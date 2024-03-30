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
    try {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    } catch (\Exception $e) {
        return redirect()->route('admin.index')->with('error', 'Failed to delete user');
    }
}
}