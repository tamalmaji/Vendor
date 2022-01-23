<form action="" method="post">
    <div class="form-group">
        <label for="title">Product Title</label>
        <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" name="title" require placeholder="Product Name" value="<?php echo $title; ?>">
        <span class="invalid-feedback"><?php echo $title_err; ?></samp>
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" rows="3" placeholder="Enter  Description ..."><?php echo $desc ?></textarea>
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
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" >

            <option selected="selected" value="0">Select Option</option>
            <option>Alaska</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>