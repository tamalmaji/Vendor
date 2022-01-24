<?php
require_once "./function/_email.php";
?>
<?php include_once './includes/header.php' ?>
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Forgate password</h2>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Forgate password</li>
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
            <div class="col-lg-6 col-md-8 col-12 m-auto">
                <div class="login-reg-form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 mb-20">
                                <label for="email">Email <span class="required">*</span></label>
                                <input name="email" id="email" type="text" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" require value="<?php echo $email ?>" />
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="col-12 mb-20">
                                <input value="Login" name="login" class="inline" type="submit">
                                <label class="inline" for="rememberme">
                                    <input value="forever" id="rememberme" name="rememberme" type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->
<?php include_once "./includes/footer.php" ?>