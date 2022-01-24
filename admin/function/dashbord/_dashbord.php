<?php
    require_once "../../function/dbConnection.php";

    $sql = 'SELECT * FROM vendor_user';
    if ($statement = $pdo->prepare($sql)) {
        if ($statement->execute()) {
          $user = $statement->rowCount();
        }
    }
    $sqli = 'SELECT * FROM vendor_usertype';
    if ($statement = $pdo->prepare($sqli)) {
        if ($statement->execute()) {
          $userType = $statement->rowCount();
        }
    }
    $sqlil = 'SELECT * FROM vendor_slider';
    if ($statement = $pdo->prepare($sqlil)) {
        if ($statement->execute()) {
          $slider = $statement->rowCount();
        }
    }
    $sq = 'SELECT * FROM vendor_product';
    if ($statement = $pdo->prepare($sq)) {
        if ($statement->execute()) {
          $product = $statement->rowCount();
        }
    }
    $sqi = 'SELECT * FROM vendor_catagory';
    if ($statement = $pdo->prepare($sqi)) {
        if ($statement->execute()) {
          $catagory = $statement->rowCount();
        }
    }
    $sqt = 'SELECT * FROM vendor_order';
    if ($statement = $pdo->prepare($sqt)) {
        if ($statement->execute()) {
          $orderIds = $statement->rowCount();
        }
    }
?>