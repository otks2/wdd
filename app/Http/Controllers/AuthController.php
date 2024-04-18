<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('login');
    }
    public function viewRegister(){
        return view('register');
    }
    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        // Hash password
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role_id'] = 2;
        // Create user
        $user = User::create($validatedData);
        Auth::login($user);
        session()->put('user_id', $user->id);

        return redirect()->route('legos.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $name = $user->email;
            $role = $user->role->name;
            $truncatedName = Str::limit($name,5);
            Session::put('username', $name);
            Session::put('role', $role);
            return redirect()->route('legos.index');
        }

        return redirect('login')->withErrors(['Incorrect credentials provided']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('legos.index');
    }

}
