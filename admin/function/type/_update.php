<?php
require_once "../../function/dbConnection.php";
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: type.php');
}

$sqi = 'SELECT * FROM vendor_for WHERE for_id = :id';
if ($statementss = $pdo->prepare($sqi)) {
    $statementss->bindValue(':id', $id);
    if ($statementss->execute()) {
        $catagory = $statementss->fetch(PDO::FETCH_ASSOC);
    }
}

$title = $catagory['for_title'];
$date = date('Y-m-d H:i:s');

$title_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);
    $title = trim($_POST['title']);

    if (empty($title)) {
        $title_err = 'Please Ener a Type';
    } 
    // else {
    //     $sql = 'SELECT for_id FROM vendor_for WHERE for_title = :title';
    //     if ($statement = $pdo->prepare($sql)) {
    //         $statement->bindValue(':title', $title);
    //         if ($statement->execute()) {
    //             if ($statement->rowCount() === 1) {
    //                 $title_err = 'Type alrady Exits';
    //             }
    //         } else {
    //             die('Somthing Went Wrong');
    //         }
    //     }
    //     unset($statement);
    // }
    if (empty($title_err)) {
        $sqli = 'UPDATE vendor_for SET for_title = :for_title, update_at = :update_at WHERE for_id = :id';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':for_title', $title);
            $statements->bindValue(':update_at', $date);
            $statements->bindValue(':id', $id);
            if ($statements->execute()) {
                header('Location: type.php');
            }
        }
    }
}

?>