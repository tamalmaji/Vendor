<?php include_once './includes/header.php' ?>

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Contact</h2>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Contact</li>
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
            <div class="contact-info col-lg-4 col-12 mb-40">
                <h3>Contact Info</h3>
                
                <p><i class="pe-7s-map-marker"></i><span>123 West Street, Melbourne Victoria <br>3000 Australia</span></p>

                <p><i class="pe-7s-call"></i><span>Phone : +061012345678</span><span>Fax : +0061012345678</span></p>

                <p><i class="pe-7s-mail"></i><a href="#/">Contact@domain.com</a><a href="#/">Support@domain.com</a></p>
                
                <div class="contact-social">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener"><i class="fa fa-linkedin"></i></a>                    
                    <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest"></i></a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener"><i class="fa fa-instagram"></i></a>
                </div>
                
            </div>
            <div class="contact-form col-lg-8 col-12 mb-40">
                <h3>Contact form</h3>
                <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php" method="post">
                    <div class="row">
                        <div class="col-md-4 col-12 mb-20">
                            <label for="name">Your Name</label>
                            <input id="name" name="con_name" type="text">
                        </div>
                        <div class="col-md-4 col-12 mb-20">
                            <label for="email">Your Email</label>
                            <input id="email" name="con_email" type="email">
                        </div>
                        <div class="col-md-4 col-12 mb-20">
                            <label for="subject">Subject</label>
                            <input id="subject" name="con_subject" type="text">
                        </div>
                        <div class="col-12 mb-20">
                            <label for="message">Message</label>
                            <textarea id="message" name="con_message"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="send">
                        </div>
                    </div>
                </form>
                <div class="form-message"></div>
            </div>
            <div class="col-12 mt-40">
                <!-- Google Map Area Start -->
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2224905.8379164026!2d-63.27089988050263!3d-2.8569688249815943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91e8605342744385%3A0x3d3c6dc1394a7fc7!2sAmazon%20Rainforest!5e0!3m2!1sen!2sbd!4v1635401091721!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <!-- End of Google Map Area -->
            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->
 <?php include_once "./includes/footer.php" ?>