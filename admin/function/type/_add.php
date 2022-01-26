<?php
require_once "../../function/dbConnection.php";

$title = '';
$date = date('Y-m-d H:i:s');
$title_err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);
    $title = trim($_POST['title']);

    if (empty($title)) {
        $title_err = 'Please Ener a Type';
    } else {
        $sql = 'SELECT for_id FROM vendor_for WHERE for_title = :title';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':title', $title);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                    $title_err = 'Type alrady Exits';
                }
            } else {
                die('Somthing Went Wrong');
            }
        }
        unset($statement);
    }
    if (empty($title_err)) {
        $sqli = 'INSERT INTO vendor_for (for_title, create_at, update_at)
        VALUE(:for_title, :create_at, :update_at)';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':for_title', $title);
            $statements->bindValue(':create_at', $date);
            $statements->bindValue(':update_at', $date);
            if ($statements->execute()) {
                header('Location: type.php');
            }
        }
    }
}

?>