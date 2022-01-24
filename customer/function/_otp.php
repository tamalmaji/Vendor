<?php
session_start();
require_once "../function/dbConnection.php";

$otp_code = '';
$otp_code_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);

    $otp = $_SESSION['otp'];
    $email = $_SESSION['mail'];
    $otp_code = trim($_POST['otp_code']);

    if (empty($otp_code)) {
        $otp_code_err = 'Enter Your OTP';
    }else{

    }
    if ($otp != $otp_code) {
        $otp_code_err = 'Invalid OTP code';
    }

    if (empty($otp_code_err)) {
        $sql = 'UPDATE vendor_user SET user_email_status = :user_email_status, user_otp = :user_otp WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':user_email_status', 'verified');
            $statement->bindValue(':user_otp', $otp_code);
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                header('Location: login.php');
            }
        }
    }
}

?>