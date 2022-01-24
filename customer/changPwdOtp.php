<?php
    require_once "./function/_changPwdOtp.php";
?>
<?php include_once './includes/header.php' ?>
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>password OTP</h2>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">password OTP</li>
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
                    <form action="changPwdOtp.php" method="POST">
                        <div class="row">
                            <div class="col-12 mb-20">
                                <label for="otp_code">OTP <span class="required">*</span></label>
                                <input type="text" class="form-control <?php echo (!empty($otp_code_err)) ? 'is-invalid' : ''; ?>" name="otp_code" require value="<?php echo $otp_code ?>" />
                                <span class="invalid-feedback"><?php echo $otp_code_err; ?></span>
                            </div>
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
<?php include_once "./includes/footer.php" ?>