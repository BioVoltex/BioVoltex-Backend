<?php

namespace App\Http\Controllers\Registeration;

use App\Http\Controllers\Controller;
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
}
