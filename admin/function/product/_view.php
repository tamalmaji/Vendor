<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: product.php');
}

require_once "../../function/dbConnection.php";

$sq = 'SELECT * FROM vendor_product WHERE product_id = :id';
if ($stmts = $pdo->prepare($sq)) {
    $stmts->bindValue(':id', $id);
    if ($stmts->execute()) {
        $product = $stmts->fetch(PDO::FETCH_ASSOC);
    }
}

$pId = $product['product_id'];
$title = $product['product_title'];
$desc = $product['product_desc'];
$price =  $product['product_price'];
$dscprice =  $product['product_dis_price'];
$qty = $product['product_qty'];
$pCatagory = $product['p_cat_id'];
$date = date('Y-m-d H:i:s');

$s = 'SELECT * FROM vendor_catagory WHERE catagory_id = :id';
if ($stmtt = $pdo->prepare($s)) {
    $stmtt->bindValue(':id', $pCatagory);
    if ($stmtt->execute()) {
        $cat = $stmtt->fetch(PDO::FETCH_ASSOC);
    }
}

$sql = 'SELECT * FROM vendor_productimages WHERE product_id = :id';
if ($stmtts = $pdo->prepare($sql)) {
    $stmtts->bindValue(':id', $id);
    if ($stmtts->execute()) {
        $productimages = $stmtts->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>