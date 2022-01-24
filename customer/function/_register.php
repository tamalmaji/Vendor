<?php
session_start();
require_once "../function/dbConnection.php";
$fName = '';
$email = '';
$pwd = '';
$c_pwd = '';
$date = date('Y-m-d H:i:s');

$fName_err = '';
$email_err = '';
$pwd_err = '';
$c_pwd_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);
    $fName = trim($_POST['fName']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $c_pwd = trim($_POST['c_pwd']);

    if (empty($fName)) {
        $fName_err = 'Enter Your Name';
    }
    if (empty($email)) {
        $email_err = 'Enter Your Email';
    } else {
        $sql = 'SELECT user_id FROM vendor_user WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                    $email_err = "Email is alrady exits";
                }
            } else {
                die('Somthing went wrong');
            }
        }
        unset($statement);
    }

    if (empty($pwd)) {
        $pwd_err = 'Please enter password and Must contain at least one number and lowercase letter, and least 8 or more characters';
    } elseif (strlen($pwd) < 8 || strlen($pwd) > 16) {
        $pwd_err = 'Password should be min 8 characters and max 16 characters';
    } elseif (!preg_match("/\b/", $pwd)) {
        $pwd_err = 'Password should  contain  at least one digite';
    } elseif (!preg_match("/[a-z]/", $pwd)) {
        $pwd_err = "Password should  contain at least one Small Letter";
    } elseif (!preg_match("/\W/", $pwd)) {
        $pwd_err = "Password should  contain at least one special character";
    } elseif (preg_match("/\s/", $pwd)) {
        $pwd_err = "Password should not contain any white space";
    }

    if (empty($pwd)) {
        $c_pwd = 'Please enter Confirm Password';
    }
    if ($pwd !== $c_pwd) {
        $c_pwd_err = "Password do not match";
    }

    if (empty($fName_err) && empty($email_err) && empty($pwd_err) && empty($c_pwd_err)) {
        $password_hash = password_hash($pwd, PASSWORD_BCRYPT);

        $sqli = "INSERT INTO vendor_user (user_name, user_email, user_pwd, create_at, update_at) 
        VALUES (:user_name, :user_email, :user_pwd, :create_at, :update_at)";

        if ($statement = $pdo->prepare($sqli)) {
            $statement->bindValue(':user_name', $fName);
            $statement->bindValue(':user_email', $email);
            $statement->bindValue(':user_pwd', $password_hash);
            $statement->bindValue(':create_at', $date);
            $statement->bindValue(':update_at', $date);
            if ($statement->execute()) {

                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;

                
                require_once "./includes/PHPMailer.php";
                require_once "./includes/SMTP.php";
                require_once "./includes/Exception.php";
                
                

                $mail = new \PHPMailer\PHPMailer\PHPMailer;

                try{
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    
                    $mail->Username = 'tamalmaji8@gmail.com';
                    $mail->Password = 'sanuge888';
                    
                    $mail->setFrom('tamalmaji8@gmail.com');
                    $mail->addAddress($_POST['email']);
                    
                    $mail->isHTML(true);
                    $mail->Subject = 'Your verify code';
                    $mail->Body = "
                    <p> Dear user, </p>
                    <h3>
                    Your Verify OPT code is $otp <br>
                    </h3> 
                    ";
                    $mail->send();
                    echo 'Message has been sent';
                    header('Location: otp.php');
                }catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }
}
?>