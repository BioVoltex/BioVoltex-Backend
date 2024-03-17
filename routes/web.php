<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registeration\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/qr', [QrCodeController::class,'generateQrCode']);
//Route::post('/qr', [QrCodeController::class,'storeQrCode']);
