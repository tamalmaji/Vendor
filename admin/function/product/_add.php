<?php
require_once "../../function/dbConnection.php";

$sql = 'SELECT * FROM vendor_catagory ORDER BY catagory_id ';
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute()) {
        $catagors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$title = '';
$desc = '';
$price = '';
$dscprice = '';
$qty = '';
$pCatagory = '';
$date = date('Y-m-d H:i:s');

$title_err = '';
$price_err = '';
$dscprice_err = '';
$qty_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);

    $title = trim($_POST['title']);
    $desc = trim($_POST['desc']);
    $price = trim($_POST['price']);
    $dscprice = trim($_POST['dscprice']);
    $qty = trim($_POST['qty']);
    $pCatagory = trim($_POST['pCatagory']);

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

    if (empty($title_err) && empty($price_err) && empty($dscprice_err) && empty($qty_err)) {
        $sqli = 'INSERT INTO vendor_product(p_cat_id, product_title, product_desc, product_qty, product_price, product_dis_price, create_at, update_at) 
        VALUE(:p_cat_id, :product_title, :product_desc, :product_qty, :product_price, :product_dis_price, :create_at, :update_at)';
        if ($statement = $pdo->prepare($sqli)) {
            $statement->bindValue(':p_cat_id', $pCatagory);
            $statement->bindValue(':product_title', $title);
            $statement->bindValue(':product_desc', $desc);
            $statement->bindValue(':product_qty', $qty);
            $statement->bindValue(':product_price', $price);
            $statement->bindValue(':product_dis_price', $dscprice);
            $statement->bindValue(':create_at', $date);
            $statement->bindValue(':update_at', $date);
            if ($statement->execute()) {
                header('Location: product.php');
            }
        }
    }
}
?>