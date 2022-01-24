<?php
require_once '../function/dbConnection.php';

$name = '';
$pwd = '';

$name_err = '';
$pwd_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);

    $name = trim($_POST['name']);
    $pwd = trim($_POST['pwd']);

    if (empty($name)) {
        $name_err = 'Enter your email';
    }
    if (empty($pwd)) {
        $pwd_err = 'Enter your password';
    }

    if (empty($name_err) && empty($pwd_err)) {
        $sql = 'SELECT user_email, user_pwd FROM vendor_user WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':email', $name);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                   if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                       $password = $row['user_pwd'];
                       if (password_verify($pwd, $password)) {
                           session_start();
                           $_SESSION['login'] = true;
                           $_SESSION['user_email'] = $row['user_email'];
                           header('location: ../index.php');
                       }else {
                        $pwd_err = 'The password you enterd is not valid';
                    }
                   }
                }else{
                    $pwd_err = 'No account fount for that eamil';
                }
            }else{
                die('Somthing Went Wrong');
            }
        }unset($statement);
    }unset($pdo);
}
?>