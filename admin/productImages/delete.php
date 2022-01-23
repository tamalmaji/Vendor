<?php

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: ../product/product.php');
}
require_once "../../function/dbConnection.php";
$sql = 'SELECT * FROM vendor_productimages WHERE productImages_id = :id';
if ($stmts = $pdo->prepare($sql)) {
    $stmts->bindValue(':id', $id);
    if ($stmts->execute()) {
        $productImg = $stmts->fetch(PDO::FETCH_ASSOC);

            if ($productImg['productImages']) {
               unlink('../../'.$productImg['productImages']);
            }
        if ($statements = $pdo->prepare('DELETE FROM vendor_productimages WHERE productImages_id = :id')) {
            $statements->bindValue(':id', $id);
             if ($statements->execute()) {
                 header('Location: ../product/product.php');
             }
         }
    }
}