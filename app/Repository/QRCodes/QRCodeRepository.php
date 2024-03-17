<?php
namespace App\Repository\QRCodes;


use App\Models\AnaerobicDigester;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Interfaces\QRCodes\QRCodeRepositoryInterface;

class QRCodeRepository implements QRCodeRepositoryInterface
{
    public function generateQrCode($data)
    {
        return QrCode::size(256)->generate($data);
    }

    public function storeQrCode($qrCodeSvg)
    {
        $qrCodePath = 'images/qrcode' . time() . '_' . uniqid() . '.svg';


        // Save the QR code as a file
        file_put_contents($qrCodePath, $qrCodeSvg);

        // Create a new AnaerobicDigester instance
        $anaerobicDigester = new AnaerobicDigester();
        $anaerobicDigester->qr_code = $qrCodePath;
        $anaerobicDigester->save();

        return $qrCodePath;
    }
}
