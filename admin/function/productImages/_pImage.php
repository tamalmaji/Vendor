<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ../product/product.php');
}
require_once "../../function/dbConnection.php";
$sql = 'SELECT * FROM vendor_productimages WHERE productImages_id  = :id';
if ($stmtts = $pdo->prepare($sql)) {
    $stmtts->bindValue(':id', $id);
    if ($stmtts->execute()) {
        $productimage = $stmtts->fetch(PDO::FETCH_ASSOC);
    }
}
?>