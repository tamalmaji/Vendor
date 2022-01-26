<?php
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: shop.php');
}

require_once "./function/dbConnection.php";
if ($id) {
    $sql = 'SELECT * FROM vendor_product WHERE p_cat_id  =:id';
    if ($statement = $pdo->prepare($sql)) {
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $shops = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
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