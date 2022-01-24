<?php
    require_once "../../function/dbConnection.php";

    $sqtl = 'SELECT * FROM vendor_product WHERE product_id = :id';
    if ($statement = $pdo->prepare($sqtl)) {
        $statement->bindValue(':id', $ordert['product_id']);
        if ($statement->execute()) {
            $productOrder = $statement->fetch(PDO::FETCH_ASSOC);
        }
    }
?>