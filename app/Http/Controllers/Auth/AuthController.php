<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendTwoFactorCode;




class AuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {

        // Validate the incoming registration request
        $newuser = $request->validated();

        // Hash the user's password
        $newuser['password'] = Hash::make($newuser['password']);

        // Set default role and status for the user
        $newuser['role'] = 'buyer';
        $newuser['status'] = 'active';

        // Create a new user in the database
        $user = User::create($newuser);

        // Generate an API token for the user
        $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;

        // Prepare the success response
        $success['name'] = $user->name;
        $success['success'] = true;


        // Return the success response
        return response()->json($success, 200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if (!$user) {
            // Return a 401 Unauthorized response if the user does not exist
            return response()->json([
                'status' => false,
                'message' => 'Incorrect email',
            ], 401);
        }

        // Check if the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Return a 401 Unauthorized response on authentication failure
            return response()->json([
                'status' => true,
                'message' => 'Incorrect password',
            ], 401);
        }

        // Generate a token for the authenticated user
        $token = $user->createToken('user_token')->plainTextToken;

        // Generate two-factor authentication code
        $user->generateTwoFactorCode();
        $user->notify(new SendTwoFactorCode());

        // Return a success response with the token and user details
        return response()->json([
            'status' => true,
            'message' => 'Logged in successfully',
            'token' => $token,
            'user' => $user,
        ], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
        ], 200);
    }
}
