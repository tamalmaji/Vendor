<?php
require_once "../../function/dbConnection.php";
$id = $_POST['id'] ?? NULL;
if (!$id) {
    header('Location: user.php');
}


$sql = 'DELETE FROM vendor_user WHERE user_id = :id';
if ($statements = $pdo->prepare($sql)) {
    $statements->bindValue(':id', $id);
    if ($statements->execute()) {
        header('Location: user.php');
    }
}