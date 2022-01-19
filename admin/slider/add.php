<?php
require_once "../../function/dbConnection.php";
$title = '';
$upload_dir = '';
$date = date('Y-m-d H:i:s');

$title_err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);
    $title = trim($_POST['title']);

    if (empty($title)) {
        $title_err = 'Enter Your Sider title';
    }else{
        $sql = 'SELECT slider_id FROM vendor_slider WHERE slider_title = :title';
        if ($statement = $pdo->prepare($sql)) {
            $statement->bindValue(':title', $title);
            if ($statement->execute()) {
                if ($statement->rowCount() === 1) {
                    $title_err = 'Sider alrady exits';
                }
            }else{
                die('Somthing went Wrong');
            }
        }
        unset($statement);
    }

    $image = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $temp_dir = $_FILES['image']['tmp_name'];

    $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png');

    if (in_array($imgExt, $valid_extensions)) {
        if ($imageSize < 5000000) {
            $picProfile = rand(1000, 1000000) . '.' . $imgExt;
            $upload_dir = 'images/slider' . $picProfile;
            $upload_File_dir = '../../images/slider' . $picProfile;
            move_uploaded_file($temp_dir, $upload_File_dir);
        }
    }

    if (empty($title_err)) {
        $sqli = 'INSERT INTO vendor_slider (slider_title, slider_image, create_at, update_at) 
        VALUE(:slider_title, :slider_image, :create_at, :update_at)';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':slider_title', $title);
            $statements->bindValue(':slider_image', $upload_dir);
            $statements->bindValue(':create_at', $date);
            $statements->bindValue(':update_at', $date);
            if ($statements->execute()) {
                header('Location: slider.php');
            }
        }
    }
}

?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="catagory.php" class="btn btn-outline-primary m-2">Back to Sider</a>
        </div>
        <div class="col-12 p-5">
            <?php include_once "./_form.php" ?>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>