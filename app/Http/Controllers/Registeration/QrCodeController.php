<?php

namespace App\Http\Controllers\Registeration;

use App\Models\AnaerobicDigester;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Interfaces\QRCodes\QRCodeRepositoryInterface;
class QrCodeController extends Controller
{
    private $qrCodeRepository;

    public function __construct(QRCodeRepositoryInterface $qrCodeRepository)
    {
        $this->qrCodeRepository = $qrCodeRepository;
    }

    public function generateQrCode()
    {
        $qrCodeSvg = $this->qrCodeRepository->generateQRCode('/');
        $qrCodePath = $this->qrCodeRepository->storeQRCode($qrCodeSvg);

        return view('qrcode', compact('qrCodeSvg'));
    }

    //check if scaned qr code exists in database
    public function checkQrCode(Request $request){
        $request->validate([
            'qr_code' => 'required',
        ]);

        //capture and decode the QR code image
        $qrCodeImage = $request->file('qr_code');
        $qrCodeSvg = file_get_contents($qrCodeImage->getRealPath());

        //check if the QR code exists
        $qrCode = AnaerobicDigester::where('qr_code',$qrCodeSvg)->first();

        if($qrCode && $qrCode->status=='used'){

        }

    }




}
