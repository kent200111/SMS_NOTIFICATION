<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminusers = AdminUser::where('usertype', 'admin')->paginate();

        return view('admin.index', compact('adminusers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        AdminUser::create($input);
        return redirect('admins')->with('flash_message', 'Admin User Added! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
     {
         try {
             // Find the AdminUser record by its ID
             $adminuser = AdminUser::findOrFail($id);
     
             // Delete the AdminUser record
             $adminuser->delete();
     
             // Redirect back to the index page with a success message
             return redirect()->route('admin.index')->with('success', 'Admin Account deleted successfully');
         } catch (ModelNotFoundException $e) {
             // Handle the case where the AdminUser with the given ID is not found
             return redirect()->route('admin.index')->with('error', 'Admin Account not found');
         } catch (\Exception $e) {
             // Handle other exceptions
             return redirect()->route('admin.index')->with('error', 'Failed to delete Admin Account');
         }
     }

}