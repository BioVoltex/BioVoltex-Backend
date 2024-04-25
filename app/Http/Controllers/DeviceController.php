<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DeviceController extends Controller
{
    public function switchDevice(Request $request)
    {
        // Validate the request data
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Get the authenticated user
        $user = auth()->user();

        // Check if user exists and is an instance of User model
        if ($user instanceof User) {
            // Validate the request data
            $request->validate([
                'device_id' => 'required|exists:devices,id,user_id,' . $user->id,
            ]);

            // Update the user's active device_id
            $user->active_device_id = $request->device_id;
            $user->save();

            return response()->json(['message' => 'Device switched successfully']);
        } else {
            return response()->json(['message' => 'User not found or authenticated'], 401);
        }
    }
}
