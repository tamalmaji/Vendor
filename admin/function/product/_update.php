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

$sql = 'SELECT * FROM vendor_catagory ORDER BY catagory_id ';
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute()) {
        $catagors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$sqt = 'SELECT * FROM vendor_for ORDER BY for_id';
if ($stmt = $pdo->prepare($sqt)) {
    if ($stmt->execute()) {
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$title = $product['product_title'];
$desc = $product['product_desc'];
$price =  $product['product_price'];
$dscprice =  $product['product_dis_price'];
$qty = $product['product_qty'];
$pCatagory = $product['p_cat_id'];
$pfor = $product['product_type_id'];
$upload_dir  = $product['product_img'];
$date = date('Y-m-d H:i:s');

$title_err = '';
$price_err = '';
$dscprice_err = '';
$qty_err = '';

$s = 'SELECT * FROM vendor_catagory WHERE catagory_id = :id';
if ($stmtt = $pdo->prepare($s)) {
    $stmtt->bindValue(':id', $pCatagory);
    if ($stmtt->execute()) {
        $cat = $stmtt->fetch(PDO::FETCH_ASSOC);
    }
}

$st = 'SELECT * FROM vendor_for WHERE for_id  = :id';
if ($stmtt = $pdo->prepare($st)) {
    $stmtt->bindValue(':id', $pfor);
    if ($stmtt->execute()) {
        $pids = $stmtt->fetch(PDO::FETCH_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);

    $title = trim($_POST['title']);
    $desc = trim($_POST['desc']);
    $price = trim($_POST['price']);
    $dscprice = trim($_POST['dscprice']);
    $qty = trim($_POST['qty']);
    $pCatagory = trim($_POST['pCatagory']);
    $pfor = trim($_POST['pfor']);

    if (empty($title)) {
        $title_err = 'Enter product Name';
    }
    if (empty($price)) {
        $price_err = 'Enter Product Price';
    }

    if (empty($dscprice)) {
        $dscprice_err = "Enter Product Discount Price";
    }

    if (empty($qty)) {
        $qty_err = 'Enter Product Qty';
    }

    $image = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $temp_dir = $_FILES['image']['tmp_name'];

    $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png');

    if (in_array($imgExt, $valid_extensions)) {
        if ($imageSize < 5000000) {
            if ($product['product_img']) {
                unlink('../../' . $product['product_img']);
            }
            $picProfile = rand(1000, 1000000) . '.' . $imgExt;
            $upload_dir = 'images/productImg/' . $picProfile;
            $upload_File_dir = '../../images/productImg/' . $picProfile;
            move_uploaded_file($temp_dir, $upload_File_dir);
        }
    }


    if (empty($title_err) && empty($price_err) && empty($dscprice_err) && empty($qty_err)) {
        $sqli = 'UPDATE vendor_product SET p_cat_id = :p_cat_id, product_type_id = :product_type_id, product_title = :product_title, product_desc = :product_desc, product_qty = :product_qty, product_price = :product_price, product_dis_price = :product_dis_price, product_img = :product_img, update_at = :update_at WHERE product_id = :id';
        if ($statement = $pdo->prepare($sqli)) {
            $statement->bindValue(':p_cat_id', $pCatagory);
            $statement->bindValue(':product_type_id', $pfor);
            $statement->bindValue(':product_title', $title);
            $statement->bindValue(':product_desc', $desc);
            $statement->bindValue(':product_qty', $qty);
            $statement->bindValue(':product_price', $price);
            $statement->bindValue(':product_dis_price', $dscprice);
            $statement->bindValue(':product_img', $upload_dir);
            $statement->bindValue(':update_at', $date);
            $statement->bindValue(':id', $id);
            if ($statement->execute()) {
                header('Location: product.php');
            }
        }
    }
}
?>