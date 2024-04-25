<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function createPassword(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        // Generate a random password
        $newPassword = Str::random(10);

        // Hash the password
        $hashedPassword = Hash::make($newPassword);


        $user = User::where('email', $request->email)->first();

        // Update the user's password in the database
        if ($user) {
            $user->password = $hashedPassword;
            $user->save();

            return response()->json(['message' => 'Password created successfully', 'password' => $newPassword]);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
