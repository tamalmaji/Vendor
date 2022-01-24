<?php
require_once "../function/dbConnection.php";
session_start();
echo $email = $_SESSION['mail'];

$pwd = '';
$c_pwd = '';
$date = date('Y-m-d H:i:s');

$pwd_err = '';
$c_pwd_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);

    $pwd = trim($_POST['pwd']);
    $c_pwd = trim($_POST['c_pwd']);
    
    if (empty($pwd)) {
        $pwd_err = 'Please enter password and Must contain at least one number and lowercase letter, and least 8 or more characters';
    } elseif (strlen($pwd) < 8 || strlen($pwd) > 16){
        $pwd_err = 'Password should be min 8 characters and max 16 characters';
    } elseif(!preg_match("/\b/", $pwd)){
        $pwd_err = 'Password should  contain  at least one digite';
    } elseif(!preg_match("/[a-z]/", $pwd)){
        $pwd_err = 'Password should  contain at least one Small Letter';
    } elseif(!preg_match("/\W/", $pwd)){
        $pwd_err = 'Password should  contain at least one special character';
    } elseif(preg_match("/\s/", $pwd)){
        $pwd_err = 'Password should not contain any white space';
    }

    if (empty($c_pwd)) {
        $c_pwd_err = 'Please enter Confirm Password';
    }
    if ($pwd !== $c_pwd) {
        $c_pwd_err = 'Password do not match';
    }

    if (empty($pwd_err) && empty($c_pwd_err)) {
        $hasPwd = password_hash($pwd, PASSWORD_BCRYPT);
        $sql = 'UPDATE vendor_user SET user_pwd = :user_pwd, update_at = :update_at WHERE user_email = :user_email';
        
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':user_pwd', $hasPwd);
            $statement->bindValue(':update_at', $date);
            $statement->bindValue(':user_email', $email);
            if ($statement->execute()) {
                header('Location: login.php');
            }
        }
    }
}
?>