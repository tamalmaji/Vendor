<?php
require_once "../../function/dbConnection.php";
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: slider.php');
}
$sq = 'SELECT * FROM vendor_slider WHERE slider_id = :id';
if ($statementt = $pdo->prepare($sq)) {
    $statementt->bindValue(':id', $id);
    if ($statementt->execute()) {
        $slider = $statementt->fetch(PDO::FETCH_ASSOC);
    }
}
$title = $slider['slider_title'];
$upload_dir = $slider['slider_image'];
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
            if ($slider['slider_image']) {
                unlink('../../' . $slider['slider_image']);
            }
            $picProfile = rand(1000, 1000000) . '.' . $imgExt;
            $upload_dir = 'images/slider/' . $picProfile;
            $upload_File_dir = '../../images/slider/' . $picProfile;
            move_uploaded_file($temp_dir, $upload_File_dir);
        }
    }

    if (empty($title_err)) {
        $sqli = 'UPDATE vendor_slider SET slider_title = :slider_title, slider_image = :slider_image, update_at = :update_at WHERE slider_id = :id';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':slider_title', $title);
            $statements->bindValue(':slider_image', $upload_dir);
            $statements->bindValue(':update_at', $date);
            $statements->bindValue(':id', $id);
            if ($statements->execute()) {
                header('Location: slider.php');
            }
        }
    }
}

?>