<?php
require_once "../function/dbConnection.php";
session_start();
$email = $_SESSION['mail'];

$sql = 'SELECT * FROM vendor_user WHERE user_email = :email';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':email', $email);
    if ($statement->execute()) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    }
}
$name = $user['user_name'];
$c_name = $user['user_company_name'];
$phone = $user['user_phone'];
$country = $user['user_country'];
$address = $user['user_address'];
$city = $user['user_city'];
$state = $user['user_state'];
$zip = $user['user_zip'];

$name_err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);

    $name = trim($_POST['name']);
    $c_name = trim($_POST['c_name']);
    $phone = trim($_POST['phone']);
    $country = trim($_POST['country']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);

    if (empty($name)) {
        $name_err = 'Enter your name';
    }

    if (empty($name_err)) {
        $sql = 'UPDATE vendor_user SET user_name = :user_name, user_company_name = :user_company_name, user_phone = :user_phone, user_country = :user_country, user_address = :user_address, user_city = :user_city, user_state = :user_state, user_zip = :user_zip  WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':user_name', $name);
            $statement->bindValue(':user_company_name', $c_name);
            $statement->bindValue(':user_phone', $phone);
            $statement->bindValue(':user_country', $country);
            $statement->bindValue(':user_address', $address);
            $statement->bindValue(':user_city', $city);
            $statement->bindValue(':user_state', $state);
            $statement->bindValue(':user_zip', $zip);
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                
            }
        }
    }
}
?>