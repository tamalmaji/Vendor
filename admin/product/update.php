<?php
    require_once "../function/product/_update.php";
?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="catagory.php" class="btn btn-outline-primary m-2">Back to Sider</a>
        </div>
        <div class="col-12 p-5">
            <form action="" method="post" enctype="multipart/form-data">
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

                        <option selected="selected" value="<?php echo $cat['catagory_id'] ?>"><?php echo $cat['catagory_title'] ?></option>
                        <?php foreach ($catagors as $i => $catagor) : ?>

                            <option value="<?php echo $catagor['catagory_id'] ?>"><?php echo $catagor['catagory_title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Type</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="pfor">

                        <option selected="selected" value="<?php echo $pids['for_id'] ?>"><?php echo $pids['for_title'] ?></option>
                        <?php foreach ($types as $i => $type) : ?>
                            <option value="<?php echo $type['for_id'] ?>"><?php echo $type['for_title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="">
                    <img src="../../<?php echo $product['product_img'] ?>" alt="" style="width: 100px;">
                </div>
                <div class="form-group">
                    <label for="img">Product Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>