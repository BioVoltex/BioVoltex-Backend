<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Chat\ChatController;
use App\Http\Controllers\API\HelpSupportController;




Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create-chat/{id}', [ChatController::class, 'create']);
    Route::post('/send-message', [ChatController::class, 'sendMessage']);
    Route::get('/show-chat-messages', [ChatController::class, 'showMessages']);
    Route::get('/show-chats', [ChatController::class, 'showChats']);
    Route::get('/chats/search', [ChatController::class, 'search']);
    Route::post('/help-support', [HelpSupportController::class,'sendEmail'])->name('help-support.send');
    // Route::get('/send-notification', [ChatController::class, 'sendMessageNotification']);

});
