<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Update the user's email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEmail(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Get the authenticated user ID
        $userId = Auth::id();

        // Fetch the user from the database
        $user = User::find($userId);

        // Update the user's email address
        $user->email = $request->input('email');
        $user->save();

        // Return a success response
        return response()->json(['message' => 'Email address updated successfully.']);
    }
}
