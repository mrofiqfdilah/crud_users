<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override method redirectTo to customize redirection based on the user's level
    protected function redirectTo()
    {
        // Get the user's level after login
        $userLevel = auth()->user()->level;

        // Determine the route based on the user's level
        switch ($userLevel) {
            case 'admin':
                return redirect()->route('admin.index')->with('success', 'Welcome, Admin!'); // Modify the success message as needed
                break;
            case 'author':
                return redirect()->route('author.index')->with('success', 'Welcome, Author!'); // Modify the success message as needed
                break;
            default:
                return $this->redirectTo;
        }
    }

    // Custom login method
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // Get the user's level after login
            $userLevel = auth()->user()->level;

            // Determine the route based on the user's level
            switch ($userLevel) {
                case 'admin':
                    return redirect()->route('admin.index')->with('success', 'Login Successfully as Admin');
                    break;
                case 'author':
                    return redirect()->route('author.index')->with('success', 'Login Successfully as Author');
                    break;
                default:
                    return redirect()->route('home')->with('success', 'Login Successfully');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid email/password combination.');
        }
    }
}
