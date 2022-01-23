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
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="catagory.php" class="btn btn-outline-primary m-2">Back to Sider</a>
        </div>
        <div class="col-12 p-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" name="title" require placeholder="Product Name" value="<?php echo $title; ?>">
                    <span class="invalid-feedback"><?php echo $title_err; ?></samp>
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter  Description ..." name="desc"><?php echo $desc ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Product price</label>
                    <input type="number" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" name="price" require placeholder="Product Name" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err; ?></samp>
                </div>
                <div class="form-group">
                    <label for="dscprice">Product discount price</label>
                    <input type="number" class="form-control <?php echo (!empty($dscprice_err)) ? 'is-invalid' : ''; ?>" name="dscprice" require placeholder="Product Name" value="<?php echo $dscprice; ?>">
                    <span class="invalid-feedback"><?php echo $dscprice_err; ?></samp>
                </div>
                <div class="form-group">
                    <label for="qty">Product qty</label>
                    <input type="number" class="form-control <?php echo (!empty($qty_err)) ? 'is-invalid' : ''; ?>" name="qty" require placeholder="Product Name" value="<?php echo $qty; ?>">
                    <span class="invalid-feedback"><?php echo $qty_err; ?></samp>
                </div>
                <div class="form-group">
                    <label>Product Catagory</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="pCatagory">

                        <option selected="selected" value="0">Select Option</option>
                        <?php foreach ($catagors as $i => $catagor) : ?>

                            <option value="<?php echo $catagor['catagory_id'] ?>"><?php echo $catagor['catagory_title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>