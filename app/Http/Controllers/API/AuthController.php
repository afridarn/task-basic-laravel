<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|between:2,100',
            'email'     => 'required|string|email|max:100|unique:users',
            'password'  => 'required|string|min:6',
            'city'      => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'city'      => $request->city,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'          => new UserResource($user),
            'access_token'  => $token,
            'token_type'    => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::firstWhere('email', $request->email);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Hi ' . $user->name . ', welcome back',
            'access_token'  => $token,
            'token_type'    => 'Bearer',
        ], 200);
    }

    public function user(Request $request)
    {
        return response()->json(['data' => new UserResource($request->user())]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have been logged out'
        ], 200);
    }
}
