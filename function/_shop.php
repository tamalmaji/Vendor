<?php
require_once "./function/dbConnection.php";
$sql = 'SELECT * FROM vendor_product';
if ($statement = $pdo->prepare($sql)) {
    if ($statement->execute()) {
        $shops = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
if ($statement = $pdo->prepare('SELECT * FROM vendor_catagory')) {
    if ($statement->execute()) {
        $catagorys = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
if ($statement = $pdo->prepare('SELECT * FROM vendor_for')) {
    if ($statement->execute()) {
        $types = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>