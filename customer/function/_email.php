<?php

use PHPMailer\PHPMailer\PHPMailer;

session_start();
require_once '../function/dbConnection.php';

$email = '';

$email_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);

    $email = trim($_POST['email']);

    if (empty($email)) {
        $email_err = 'Enter your email';
    }

    if (empty($email_err)) {
        $sql = 'SELECT user_email FROM vendor_user WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;

                    require_once "./includes/PHPMailer.php";
                    require_once "./includes/SMTP.php";
                    require_once "./includes/Exception.php";

                    $mail = new PHPMailer();

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth =  true;
                        $mail->Port = 587;

                        $mail->Username = 'tamalmaji8@gmail.com';
                        $mail->Password = 'sanuge888';

                        $mail->setFrom('tamalmaji8@gmail.com');
                        $mail->addAddress(trim($_POST['email']));

                        $mail->isHTML(true);
                        $mail->Subject = 'Your verify code';
                        $mail->Body = "
                            <p>Dear user</p>
                            <h3>Your Verify OPT code is $otp</h3>
                        ";
                        $mail->send();
                        echo 'Message has been sent';
                        header('Location: changPwdOtp.php');
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    $pwd_err = 'No account fount for that eamil';
                }
            } else {
                die('Somthing Went Wrong');
            }
        }
        unset($statement);
    }
    unset($pdo);
}
?>