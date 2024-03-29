<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        // Construct the update array
        $updateData = [];

        // Update password if provided and validated
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        // Update other profile fields
        if ($request->filled('first_name')) {
            $updateData['first_name'] = $request->input('first_name');
        }

        if ($request->filled('middle_name')) {
            $updateData['middle_name'] = $request->input('middle_name');
        }

        if ($request->filled('last_name')) {
            $updateData['last_name'] = $request->input('last_name');
        }

        if ($request->filled('id_number')) {
            $updateData['id_number'] = $request->input('id_number');
        }

        if ($request->filled('college')) {
            $updateData['college'] = $request->input('college');
        }

        if ($request->filled('gender')) {
            $updateData['gender'] = $request->input('gender');
        }

        if ($request->filled('contact_number')) {
            $updateData['contact_number'] = $request->input('contact_number');
        }

        if ($request->filled('email')) {
            $updateData['email'] = $request->input('email');
        }

        // Update the user model
        if (!empty($updateData)) {
            $user->update($updateData);
            return redirect()->back()->with('success', 'Profile updated.');
        } else {
            return redirect()->back()->withErrors(['error' => 'No fields to update.']);
        }
    }
}
