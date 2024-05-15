<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255'],
            'college' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Male,Female'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', function ($attribute, $value, $fail) {
                if (strpos($value, '@cmu.edu.ph') === false) {
                    $fail('The '.$attribute.' must be a valid @cmu.edu.ph institutional email address.');
                }
            }],
            'contact_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // If the email does not contain '@cmu.edu.ph', flash the warning message to the session
        if (strpos($validatedData['email'], '@cmu.edu.ph') === false) {
            // Set a session variable with the warning message
            Session::flash('emailWarning', 'Please use a valid @cmu.edu.ph institutional email address.');
            return redirect()->back()->withInput();
        }
    
        // Create a new User instance
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->middle_name = $validatedData['middle_name'];
        $user->last_name = $validatedData['last_name'];
        $user->id_number = $validatedData['id_number'];
        $user->college = $validatedData['college'];
        $user->gender = $validatedData['gender'];
        $user->email = $validatedData['email'];
        $user->contact_number = $validatedData['contact_number'];
        $user->password = Hash::make($validatedData['password']);
    
        // Save the user to the database
        $user->save();
    
        // You can customize the redirect path or response as needed
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}