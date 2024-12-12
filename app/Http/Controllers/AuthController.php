<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with('failed', 'failed');
        }else{
            return redirect()->back()->with('success', 'success');
        }
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'name' => 'required|string',
        ]);

        $check = User::where('email', $request->email)->count();
        if($check != 0){
            return redirect()->back()->with('failed', 'failed');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'success');
    }
}
