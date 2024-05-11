<?php
require __DIR__ . '/vendor/autoload.php';

use chillerlan\QRCode\{QRCode, QROptions};

// Define data (URL) to encode
$data = 'https://www.google.com/search?gs_ssp=eJwFwUsKgCAQAFDa1hkCN61zzBA9QreY0amEPmCS0ul7r-3GbYQcfMgfyMYNsk7kFSOCIWYJenWyqtUqq5We0DAEmpf-xB3fmAQf7HO6r-gfQZEKFwzxBx8FGs4&q=mahavir+electronics+bibwewadi&rlz=1C1ONGR_enIN1066IN1066&sourceid=chrome&ie=UTF-8#lrd=0x3bc2eaa17bee014f:0x2f9294243a7e1db5,3'; // Example URL (replace with your data)

// Create QR code options
$options = new QROptions([
    'version'    => 20, // Increase version to support more data
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel'   => QRCode::ECC_H, // Use high error correction
    'scale'      => 5, // Adjust scale to fit more data
]);

// Initialize QRCode object
$qrcode = new QRCode($options);

try {
    // Generate QR code image and save to a temporary file
    $tempFile = tempnam(sys_get_temp_dir(), 'qr');
    $qrcode->render($data, $tempFile);

    // Create GD image resource from the QR code image
    $qrImage = imagecreatefrompng($tempFile);
    if (!$qrImage) {
        throw new Exception('Error creating GD image from QR code file.');
    }

    // Output the final QR code image to the browser
    header('Content-Type: image/png');
    imagepng($qrImage);

    // Clean up resources
    imagedestroy($qrImage);

    // Delete temporary file
    unlink($tempFile);

} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>
