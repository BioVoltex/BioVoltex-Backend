<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Chat\ChatController;
use App\Http\Controllers\API\ForYou\ForYouController;
use App\Http\Controllers\API\GasSensorController;
use App\Http\Controllers\API\HelpSupportController;
use App\Http\Controllers\Auth\AuthController;

// Registration route
Route::post('/register', [AuthController::class, 'register']);

// Login route
Route::post('/login', [AuthController::class, 'login']);

// Logout route
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



// Reset password
Route::middleware('auth:api')->group(function () {
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
});

// Create password
Route::post('create-password', [PasswordController::class, 'createPassword']);

// Updating email
Route::put('user/email', [UserController::class, 'updateEmail']);

//Switching devices
Route::post('switch-device', [DeviceController::class, 'switchDevice']);

Route::middleware('auth:sanctum')->group(function () {

    //-----------------------------------------------Chat routes------------------------------------------------//

        Route::post('/create-chat/{id}', [ChatController::class, 'create']);
        Route::post('/send-message', [ChatController::class, 'sendMessage']);
        Route::get('/show-chat-messages', [ChatController::class, 'showMessages']);
        Route::get('/show-chats', [ChatController::class, 'showChats']);
        Route::get('/chats/search', [ChatController::class, 'search']);
        Route::post('/help-support', [HelpSupportController::class,'sendEmail'])->name('help-support.send');
        // Route::get('/send-notification', [ChatController::class, 'sendMessageNotification']);

    //-----------------------------------------------------------------------------------------------------------//



    //-----------------------------------------------For you routes------------------------------------------------//

        Route::post('/gas-amount', [GasSensorController::class,'store']);
        Route::get('/show-devices', [ForYouController::class, 'index']);
        Route::post('/add-device', [ForYouController::class, 'store']);
        Route::post('/update-device', [ForYouController::class, 'update']);

    //-----------------------------------------------------------------------------------------------------------//

});
