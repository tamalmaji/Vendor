<?php
    require_once "../function/productImages/_pImage.php";
?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="../product/product.php" class="btn btn-outline-primary m-2">Back to Product</a>
        </div>
        <div class="col-12 p-5">
            <div class="row">
                <div class="col-8">
                    <img src="../../<?php echo $productimage['productImages'] ?>" alt="Product Image-<?php echo $i + 1 ?>">
                </div>
                <div class="col-4">
                    <form action="delete.php" method="POST" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?php echo $productimage['productImages_id'] ?>">
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>