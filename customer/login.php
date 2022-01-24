<?php
    require_once "./function/_login.php";
?>
<?php include_once './includes/header.php' ?>
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>login</h2>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">login</li>
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
                                <label for="name">Email <span class="required">*</span></label>
                                <input name="name" id="name" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" require value="<?php echo $name ?>" />
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="pwd">Passwords <span class="required">*</span></label>
                                <input name="pwd" id="password" type="password" class="form-control <?php echo (!empty($pwd_err)) ? 'is-invalid' : ''; ?>" require value="<?php echo $pwd ?>" />
                                <span class="invalid-feedback"><?php echo $pwd_err; ?></span>
                            </div>
                            <div class="col-12 mb-20">
                                <input value="Login" name="login" class="inline" type="submit">
                                <label class="inline" for="rememberme">
                                    <input value="forever" id="rememberme" name="rememberme" type="checkbox"> Remember me		
                                </label>
                            </div>
                            <div class="col-12">
                                <a href="email.php">Lost your password?</a>
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