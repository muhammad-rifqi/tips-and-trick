<?php
require 'vendor/autoload.php';

use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


// Buat instance GoogleAuthenticator
$gAuth = new GoogleAuthenticator();

// Generate secret key
$secret = $gAuth->generateSecret();

// simpan ke database di kolom `google2fa_secret`
// echo "Secret: " . $secret;

$cookie_name = "rifqi_cookie";
$cookie_value = $secret;
$expiry_time = time() + 3600;

setcookie($cookie_name, $cookie_value, $expiry_time, "/");


// Secret key user (dari database)
$website = "RifhandiApp";
$userEmail = "admin@rifhandi.com";

// Format TOTP untuk Google Authenticator
$otpAuthUrl = "otpauth://totp/{$website}:{$userEmail}?secret={$secret}&issuer={$website}";

// Generate QR
$qr = QrCode::create($otpAuthUrl);
$writer = new PngWriter();
$result = $writer->write($qr);

// Tampilkan langsung di browser
header('Content-Type: '.$result->getMimeType());
echo $result->getString();
