<?php

namespace App\Http\Controllers\Registration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function create(){
        $qr_image = QrCode::format('png')
        ->size(200)
        ->generate('digister QR code');

        $output_qr = '/img/qr-code/'.time().'.png';
        Storage::disk('public')->put($output_qr,$qr_image);
    }
}
