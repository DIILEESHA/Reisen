<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{





    public function showDashboard()
    {
        // Fetch all registered users
        $users = User::all();
        
        // Pass user data to the dashboard view
        return view('dashboard', ['users' => $users]);
    }

    
    // show login form
    public function showLoginForm()
    {
        return view('pages.login');
    }

        // Handle login form submission
        public function login(Request $request)
        {
            try {
                // Validate the form data
                $credentials = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                  // Check if the user is an admin
                if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin12345') {
                // Redirect to the admin dashboard or any other admin-specific page
                return redirect('/dashboard');
                }
    
                // Attempt to authenticate the user
                if (Auth::attempt($credentials, $request->has('remember'))) {
                    // Authentication passed, redirect to the homepage
                    return redirect('/');
                }
    
                // Authentication failed, redirect back with error
                return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
            } catch (\Exception $e) {
                // Handle any exceptions that occur during login
                return back()->withErrors(['error' => 'Error occurred while logging in'])->withInput();
            }
        }
    
      // Show registration form
      public function showRegistrationForm()
      {
          return view('pages.signup');
      }

 // Handle registration form submission
    public function signup(Request $request)
    {
        try {
        // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
            ]);

        // Create a new user record
        $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            Auth::login($user);

            return redirect('/login')->with('success', 'Signup Successful. Please login.');
        } catch (\Exception $e) {
                // dd($e->getMessage()); 
                return back()->withInput()->withErrors(['error' => 'Error occurred while signing up']);
        }
    }

     // Logout the user
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return redirect('/')->with('success', 'You have been logged out.');
     }

     // Update user profile including password
public function updateProfile(Request $request)
{
    try {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8', 
        ]);

        $user = Auth::user();

        // Update username and email
        $user->name = $validatedData['username'];
        $user->email = $validatedData['email'];

        // Update password if provided
        if ($request->has('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Error occurred while updating profile']);
    }
}


}
