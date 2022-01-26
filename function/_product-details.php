<?php
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: shop.php');
}

require_once "./function/dbConnection.php";

$sql = 'SELECT * FROM vendor_product WHERE product_id = :id';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        $shop = $statement->fetch(PDO::FETCH_ASSOC);
        $proId = $shop['product_id'];
        $cid = $shop['p_cat_id'];
        $tid = $shop['product_type_id'];
    }
}
if ($statement = $pdo->prepare('SELECT * FROM vendor_productimages WHERE product_id = :id LIMIT 0,1')) {
    $statement->bindValue(':id', $proId);
    if ($statement->execute()) {
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    }
}
if ($statement = $pdo->prepare('SELECT * FROM vendor_productimages WHERE product_id = :id')) {
    $statement->bindValue(':id', $proId);
    if ($statement->execute()) {
        $productImgs = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

if ($statement = $pdo->prepare('SELECT * FROM vendor_product WHERE p_cat_id = :cid && product_type_id = :tid')) {
    $statement->bindValue(':cid', $cid);
    $statement->bindValue(':tid', $tid);
    if ($statement->execute()) {
        $relatives = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>