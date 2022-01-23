<?php
require_once '../function/dbConnection.php';

$name = '';
$pwd = '';

$name_err = '';
$pwd_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);

    $name = trim($_POST['name']);
    $pwd = trim($_POST['pwd']);

    if (empty($name)) {
        $name_err = 'Enter your email';
    }
    if (empty($pwd)) {
        $pwd_err = 'Enter your password';
    }

    if (empty($name_err) && empty($pwd_err)) {
        $sql = 'SELECT user_email, user_pwd FROM vendor_user WHERE user_email = :email';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':email', $name);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                   if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                       $password = $row['user_pwd'];
                       if (password_verify($pwd, $password)) {
                           session_start();
                           $_SESSION['login'] = true;
                           $_SESSION['user_email'] = $row['user_email'];
                           header('location: ../index.php');
                       }
                   }
                }else{
                    $pwd_err = 'No account fount for that eamil';
                }
            }else{
                die('Somthing Went Wrong');
            }
        }unset($statement);
    }unset($pdo);
}
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
                                <a href="#/">Lost your password?</a>
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