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
                    <form action="#">
                        <div class="row">
                            <div class="col-xs-12 mb-20">
                                <label class="" for="r_password">Old password<span class="required">*</span></label>
                                <input id="r_password" type="password">
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label class="" for="r_password">Account password<span class="required">*</span></label>
                                <input id="r_password" type="password">
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label class="" for="r_c_password">Confirm password<span class="required">*</span></label>
                                <input id="r_c_password" type="password">
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