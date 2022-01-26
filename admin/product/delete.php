 <?php

    $id = $_POST['id'] ?? null;
    if (!$id) {
        header('Location: product.php');
    }
    require_once "../../function/dbConnection.php";
    if ($statement = $pdo->prepare('SELECT * FROM vendor_product WHERE product_id = :id')) {
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $product = $statement->fetch(PDO::FETCH_ASSOC);
            if ($product['product_img']) {
                unlink('../../' . $product['product_img']);
            }
        }
    }
    $sql = 'SELECT * FROM vendor_productimages WHERE product_id = :id';
    if ($stmts = $pdo->prepare($sql)) {
        $stmts->bindValue(':id', $id);
        if ($stmts->execute()) {
            $productImgs = $stmts->fetchAll(PDO::FETCH_ASSOC);

            foreach ($productImgs as $i => $productImg) {
                if ($productImg['productImages']) {
                    unlink('../../' . $productImg['productImages']);
                }
            }
            if ($statements = $pdo->prepare('DELETE FROM vendor_productimages WHERE product_id = :id')) {
                $statements->bindValue(':id', $id);
                if ($statements->execute()) {
                    
                    if ($statement = $pdo->prepare('DELETE FROM vendor_product WHERE product_id = :id')) {
                        $statement->bindValue(':id', $id);
                        if ($statement->execute()) {
                            header('Location: ../product/product.php');
                        }
                    }
                }
            }
        }
    }
