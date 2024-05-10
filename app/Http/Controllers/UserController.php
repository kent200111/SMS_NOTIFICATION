<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Semaphore\Sms\Sms;

class UserController extends Controller
{

    public function deleteindex()
    {
        $users = User::where('usertype', 'user')
                     ->orderBy('id', 'asc')
                     ->get(); 
    
        return view('users.deleteindex', compact('users'));
    }      
    

public function index()
{
    $users = User::where('usertype', 'user')
                 ->where('delete_request', 1)
                 ->paginate();

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

public function showDeleteAccountForm()
{
    return view('users.delete');
}

public function submitDeleteAccount(Request $request) // Update the method signature
{
    $user = $request->user();

    // Update the delete_request column to true
    $user->update(['delete_request' => true]);

    return view('users.after_delete');
}

}