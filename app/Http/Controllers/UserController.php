<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;


class UserController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::defaults()]
        ]);

        $User = User::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $User
        ]);
    }
}
