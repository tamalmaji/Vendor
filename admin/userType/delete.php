<?php
$id = $_POST['id'] ?? NULL;

if (!$id) {
    header('Location: userType.php');
}
require_once '../../function/dbConnection.php';
$sql = 'DELETE FROM vendor_usertype WHERE userType_id  = :id';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        header('Location: userType.php');
    }
}