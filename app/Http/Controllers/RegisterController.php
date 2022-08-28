<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register', [
            "title" => "Register",
            "active" => "register",
        ]);

        // $user = Auth::loginUsingId(1);
        // dd($user->name);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'city' => 'required|min:3|max:255',
            'store' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:60',
        ]);

        // $validated['password'] = bcrypt($validated['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user_data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'city' => $validatedData['city'],
            'password' => $validatedData['password'],
        ];

        User::create($user_data);

        $store_data = [
            'user_id' => User::where('email', $request->email)->first()->id,
            'name' => $validatedData['store'],
        ];

        Store::create($store_data);

        // $request->session()->flash('success', 'Register successful!');

        return redirect('/login')->with('success', 'Register successful!');
    }
}
