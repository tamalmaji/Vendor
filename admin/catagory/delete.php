<?php
$id = $_POST['id'] ?? NULL;

if (!$id) {
    header('Location: catagory.php');
}
require_once '../../function/dbConnection.php';
$sql = 'DELETE FROM vendor_catagory WHERE catagory_id  = :id';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        header('Location: catagory.php');
    }
}