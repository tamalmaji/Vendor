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

$pId = $product['product_id'];
$title = $product['product_title'];
$desc = $product['product_desc'];
$price =  $product['product_price'];
$dscprice =  $product['product_dis_price'];
$qty = $product['product_qty'];
$pCatagory = $product['p_cat_id'];
$date = date('Y-m-d H:i:s');

$s = 'SELECT * FROM vendor_catagory WHERE catagory_id = :id';
if ($stmtt = $pdo->prepare($s)) {
    $stmtt->bindValue(':id', $pCatagory);
    if ($stmtt->execute()) {
        $cat = $stmtt->fetch(PDO::FETCH_ASSOC);
    }
}

$sql = 'SELECT * FROM vendor_productimages WHERE product_id = :id';
if ($stmtts = $pdo->prepare($sql)) {
    $stmtts->bindValue(':id', $id);
    if ($stmtts->execute()) {
        $productimages = $stmtts->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="product.php" class="btn btn-outline-primary m-2">Back to Sider</a>
        </div>
        <div class="col-12 p-5">
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?php echo $title ?></h3>
                                <a class="btn btn-outline-primary btn-xs m-2" href="../productImages/add.php?id=<?php echo $pId ?>">Add Images</a>
                                <form action="../productImages/deleteAll.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $pId ?>">
                                    <button type="submit" class="btn btn-danger btn-xs">Delete All</button>
                                </form>
                                <div class="col-12 product-image-thumbs">
                                    <?php foreach ($productimages as $i => $productimage) : ?>
                                        <div class="product-image-thumb">
                                            <a href="../productImages/pImage.php?id=<?php echo $productimage['productImages_id'] ?>">
                                                <img src="../../<?php echo $productimage['productImages'] ?>" alt="Product Image-<?php echo $i + 1 ?>">
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?php echo $title ?></h3>
                                <p>
                                    <?php echo $desc ?>
                                </p>
                                <p class="product-details">
                                    <span class="price section">
                                        <span class="new">₹ <?php echo $price ?></span>
                                        <span class="old" style="color: #999; text-decoration: line-through;"> ₹ <?php echo $dscprice ?></span>
                                    </span>
                                </p>
                                <hr>
                                <h4>Product Catagory</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center active">
                                        <?php echo $cat['catagory_title'] ?>
                                    </label>
                                </div>
                                <br>
                                <h4>Available Colors</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center active">
                                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                                        Green
                                        <br>
                                        <i class="fas fa-circle fa-2x text-green"></i>
                                    </label>
                                </div>

                                <h4 class="mt-3">Size <small>Please select one</small></h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                        <span class="text-xl">S</span>
                                        <br>
                                        Small
                                    </label>
                                </div>

                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        $80.00
                                    </h2>
                                    <h4 class="mt-0">
                                        <small>Ex Tax: $80.00 </small>
                                    </h4>
                                </div>

                                <div class="mt-4">
                                    <div class="btn btn-primary btn-lg btn-flat">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart
                                    </div>

                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-heart fa-lg mr-2"></i>
                                        Add to Wishlist
                                    </div>
                                </div>

                                <div class="mt-4 product-share">

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>