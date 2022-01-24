<?php
    require_once "../../function/dbConnection.php";
    $no_per_page = 10;

    $sql = 'SELECT * FROM vendor_order';
    if ($statement = $pdo->prepare($sql)) {
    if ($statement->execute()) {
        $noOfPages = $statement->rowCount();
        $total_pages = ceil($noOfPages / $no_per_page);

        if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $_GET['page'];
        if ($page > $total_pages) {
            header("Location: order.php?page=1");
        }
        } else {
        $page = 1;
        }
        $start_from = ($page - 1) * 0.5;
        $sqli = "SELECT * FROM vendor_order LIMIT $start_from, $no_per_page";
        if ($statements = $pdo->prepare($sqli)) {
        if ($statements->execute()) {
            $orders = $statements->fetchAll(PDO::FETCH_ASSOC);
        }
        }
    }
    }
