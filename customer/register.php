<?php
    require_once "./function/_register.php";
?>
<?php include_once './includes/header.php' ?>

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Register</h2>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Register</li>
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
                    <form action="register.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="fName">First Name <span class="required">*</span></label>
                                <input id="fName" type="text" class="form-control <?php echo (!empty($fName_err)) ? 'is-invalid' : ''; ?>" name="fName" require value="<?php echo $fName ?>" />
                                <span class="invalid-feedback"><?php echo $fName_err; ?></span>
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input id="email" type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" require value="<?php echo $email ?>" />
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label class="" for="pwd">Account password<span class="required">*</span></label>
                                <input id="pwd" type="password" class="form-control <?php echo (!empty($pwd_err)) ? 'is-invalid' : ''; ?>" name="pwd" require value="<?php echo $pwd ?>" />
                                <span class="invalid-feedback"><?php echo $pwd_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label class="" for="c_pwd">Confirm password<span class="required">*</span></label>
                                <input id="c_pwd" type="password" class="form-control <?php echo (!empty($c_pwd_err)) ? 'is-invalid' : ''; ?>" name="c_pwd" require value="<?php echo $c_pwd ?>" />
                                <span class="invalid-feedback"><?php echo $c_pwd_err; ?></span>
                            </div>
                            <!-- <div class="col-xs-12 mb-20">
                                <input id="rememberme" type="checkbox">
                                <label for="rememberme">I agree <a href="contact.html">Terms &amp; Condition</a></label>
                            </div> -->
                            <div class="col-xs-12">
                                <!-- <input value="register" type="submit"> -->
                                <button type="submit" class="btn btn-primary">Submit</button>
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
use PHPMailer\PHPMailer\PHPMailer;
