<?php
    require_once "../../function/dbConnection.php";
    $s = 'SELECT * FROM vendor_order ORDER BY order_id DESC LIMIT 10';
    if ($statement = $pdo->prepare($s)) {
        if ($statement->execute()) {
           $orderts = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>