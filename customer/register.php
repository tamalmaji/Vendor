<?php
session_start();
require_once "../function/dbConnection.php";
$fName = '';
$email = '';
$pwd = '';
$c_pwd = '';
$date = date('Y-m-d H:i:s');

$fName_err = '';
$email_err = '';
$pwd_err = '';
$c_pwd_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);
    $fName = trim($_POST['fName']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $c_pwd = trim($_POST['c_pwd']);

    if (empty($fName)) {
        $fName_err = 'Enter Your Name';
    }
    if (empty($email)) {
        $email_err = 'Enter Your Email';
    } else {
        $sql = 'SELECT user_id FROM vendor_user WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                    $email_err = "Email is alrady exits";
                }
            } else {
                die('Somthing went wrong');
            }
        }
        unset($statement);
    }

    if (empty($pwd)) {
        $pwd_err = 'Please enter password and Must contain at least one number and lowercase letter, and least 8 or more characters';
    } elseif (strlen($pwd) < 8 || strlen($pwd) > 16) {
        $pwd_err = 'Password should be min 8 characters and max 16 characters';
    } elseif (!preg_match("/\b/", $pwd)) {
        $pwd_err = 'Password should  contain  at least one digite';
    } elseif (!preg_match("/[a-z]/", $pwd)) {
        $pwd_err = "Password should  contain at least one Small Letter";
    } elseif (!preg_match("/\W/", $pwd)) {
        $pwd_err = "Password should  contain at least one special character";
    } elseif (preg_match("/\s/", $pwd)) {
        $pwd_err = "Password should not contain any white space";
    }

    if (empty($pwd)) {
        $c_pwd = 'Please enter Confirm Password';
    }
    if ($pwd !== $c_pwd) {
        $c_pwd_err = "Password do not match";
    }

    if (empty($fName_err) && empty($email_err) && empty($pwd_err) && empty($c_pwd_err)) {
        $password_hash = password_hash($pwd, PASSWORD_BCRYPT);

        $sqli = "INSERT INTO vendor_user (user_name, user_email, user_pwd, create_at, update_at) 
        VALUES (:user_name, :user_email, :user_pwd, :create_at, :update_at)";

        if ($statement = $pdo->prepare($sqli)) {
            $statement->bindValue(':user_name', $fName);
            $statement->bindValue(':user_email', $email);
            $statement->bindValue(':user_pwd', $password_hash);
            $statement->bindValue(':create_at', $date);
            $statement->bindValue(':update_at', $date);
            if ($statement->execute()) {

                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;

                
                require_once "./includes/PHPMailer.php";
                require_once "./includes/SMTP.php";
                require_once "./includes/Exception.php";
                
                

                $mail = new \PHPMailer\PHPMailer\PHPMailer;

                try{
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    
                    $mail->Username = 'tamalmaji8@gmail.com';
                    $mail->Password = 'sanuge888';
                    
                    $mail->setFrom('tamalmaji8@gmail.com');
                    $mail->addAddress($_POST['email']);
                    
                    $mail->isHTML(true);
                    $mail->Subject = 'Your verify code';
                    $mail->Body = "
                    <p> Dear user, </p>
                    <h3>
                    Your Verify OPT code is $otp <br>
                    </h3> 
                    ";
                    $mail->send();
                    echo 'Message has been sent';
                    header('Location: otp.php');
                }catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }
}
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
                            <!-- <div class="col-md-6 col-xs-12 mb-20">
                                <label for="lName">Last Name <span class="required">*</span></label>									
                                <input id="lName" type="text" class="form-control <?php echo (!empty($lName_err)) ? 'is-invalid' : ''; ?>" name="lName" require value="<?php echo $lName ?>" />
                                <span class="invalid-feedback"><?php echo $lName_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="com">Company Name</label>									
                                <input id="com" type="text" class="form-control <?php echo (!empty($com_err)) ? 'is-invalid' : ''; ?>" name="com" require value="<?php echo $com ?>" />
                                <span class="invalid-feedback"><?php echo $com_err; ?></span>
                            </div> -->
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input id="email" type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" require value="<?php echo $email ?>" />
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <!-- <div class="col-md-6 col-xs-12 mb-20">
                                <label for="phone">Phone  <span class="required">*</span></label>										
                                <input id="phone" type="text" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" name="phone" require value="<?php echo $phone ?>" />
                                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="r_country">Country <span class="required">*</span></label>
                                <select id="r_country">
                                  <option value="1">Select a country</option>
                                  <option value="2">bangladesh</option>
                                  <option value="3">Algeria</option>
                                  <option value="4">Afghanistan</option>
                                  <option value="5">Ghana</option>
                                  <option value="6">Albania</option>
                                  <option value="7">Bahrain</option>
                                  <option value="8">Colombia</option>
                                  <option value="9">Dominican Republic</option>
                                </select>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label>Address <span class="required">*</span></label>
                                <input type="text" placeholder="Street address" class="form-control <?php echo (!empty($add_err)) ? 'is-invalid' : ''; ?>" name="add" require value="<?php echo $add ?>" />
                                <span class="invalid-feedback"><?php echo $add_err; ?></span>
                            </div>
                            <div class="col-xs-12 mb-20">
                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                            </div>
                            <div class="col-xs-12 mb-20">
                                <label for="city">Town / City <span class="required">*</span></label>
                                <input id="city" type="text" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" name="city" require value="<?php echo $city ?>" />
                                <span class="invalid-feedback"><?php echo $city_err; ?></span>
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label>State / County <span class="required">*</span></label>										
                                <input type="text" class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>" name="state" require value="<?php echo $state ?>" />
                                <span class="invalid-feedback"><?php echo $state_err; ?></span>
                            </div>
                            <div class="col-md-6 col-xs-12 mb-20">
                                <label for="zip">Postcode / Zip <span class="required">*</span></label>										
                                <input id="zip" type="text" class="form-control <?php echo (!empty($zip_err)) ? 'is-invalid' : ''; ?>" name="zip" require value="<?php echo $zip ?>" />
                                <span class="invalid-feedback"><?php echo $zip_err; ?></span>
                            </div> -->
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
