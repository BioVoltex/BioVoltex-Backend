<?php
namespace App\Interfaces\QRCodes;




interface QRCodeRepositoryInterface
{
    public function generateQRCode($qr);

    public function storeQRCode($qrCodeSvg);

}
