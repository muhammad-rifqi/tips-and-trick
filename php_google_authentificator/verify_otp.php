<?php
session_start();
require_once 'vendor/autoload.php';

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

$val = $_COOKIE['rifqi_cookie'];
$secret = $val;
$otp = $_POST['otp'];

if ($g->checkCode($secret, $otp)) {
    $_SESSION['logged_in'] = true;
    echo "Login berhasil 🎉";
} else {
    echo "Kode OTP salah!";
}
