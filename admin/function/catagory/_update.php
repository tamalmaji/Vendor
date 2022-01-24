<?php
require_once "../../function/dbConnection.php";
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: catagory.php');
}

$sqi = 'SELECT * FROM vendor_catagory WHERE catagory_id = :id';
if ($statementss = $pdo->prepare($sqi)) {
    $statementss->bindValue(':id', $id);
    if ($statementss->execute()) {
        $catagory = $statementss->fetch(PDO::FETCH_ASSOC);
    }
}

$title = $catagory['catagory_title'];
$date = date('Y-m-d H:i:s');

$title_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);
    $title = trim($_POST['title']);

    if (empty($title)) {
        $title_err = 'Please Ener a Catagory';
    } 
    // else {
    //     $sql = 'SELECT catagory_id FROM vendor_catagory WHERE catagory_title = :title';
    //     if ($statement = $pdo->prepare($sql)) {
    //         $statement->bindValue(':title', $title);
    //         if ($statement->execute()) {
    //             if ($statement->rowCount() === 1) {
    //                 $title_err = 'Catagory alrady Exits';
    //             }
    //         } else {
    //             die('Somthing Went Wrong');
    //         }
    //     }
    //     unset($statement);
    // }
    if (empty($title_err)) {
        $sqli = 'UPDATE vendor_catagory SET catagory_title = :catagory_title, update_at = :update_at WHERE catagory_id = :id';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':catagory_title', $title);
            $statements->bindValue(':update_at', $date);
            $statements->bindValue(':id', $id);
            if ($statements->execute()) {
                header('Location: catagory.php');
            }
        }
    }
}

?>