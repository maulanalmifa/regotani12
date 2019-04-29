<?php
require('textlocal.class.php');
require('credential.php');

$textlocal = new Textlocal(false,false,API_KEY);

$numbers = array(MOBILE);
$sender = 'Textlocal';
$otp = mt_rand(10000,99999);
$message = 'This is a message';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>