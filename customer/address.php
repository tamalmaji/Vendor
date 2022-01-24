<?php
    require_once "./function/_address.php";
?>
<?php include_once './includes/header.php' ?>

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Address</h2>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Address</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BANNER SECTION -->

<!-- PAGE SECTION START -->
<div class="page-section section pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
                <div class="login-reg-form">
                    <form action="address.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 mb-20">
                                <label for="name">Name <span class="required">*</span></label>
                                <input id="name" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" name="name" require value="<?php echo $name ?>" />
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="c_name">Company Name</label>
                                <input id="c_name" type="text" class="form-control" name="c_name" value="<?php echo $c_name ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="phone">Phone </label>
                                <input id="phone" type="text" class="form-control" name="phone" value="<?php echo $phone ?>" />
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="country">Country </label>
                                <select id="country" name="country">
                                    <option value="1">India</option>
                                </select>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label>Address</label>
                                <input type="text" placeholder="Street address" name="address" class="form-control" value="<?php echo $address ?>" />
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="city">Town / City</label>
                                <input id="city" type="text" class="form-control" name="city" value="<?php echo $city ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label>State </label>
                                <input type="text" name="state" class="form-control" value="<?php echo $state ?>" />
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="zip">Postcode / Zip</label>
                                <input id="zip" type="text" name="zip" class="form-control" value="<?php echo $zip ?>" />
                            </div>
                            <div class="col-xs-12 mb-20">
                                <input id="rememberme" type="checkbox">
                                <label for="rememberme">I agree <a href="contact.html">Terms &amp; Condition</a></label>
                            </div>
                            <div class="col-xs-12">
                                <input value="register" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->

<?php include_once './includes/footer.php' ?>