<?php
$id = $_POST['id'] ?? NULL;

if (!$id) {
    header('Location: tupe.php');
}
require_once '../../function/dbConnection.php';
$sql = 'DELETE FROM vendor_for WHERE for_id   = :id';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        header('Location: type.php');
    }
}