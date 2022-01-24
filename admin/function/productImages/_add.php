<?php
require_once "../../function/dbConnection.php";
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: ../product/product.php');
}


$upload_dir = '';
$date = date('Y-m-d H:i:s');

if (!is_dir('../../images/product/')) {
    mkdir('../../images/product/');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valid_extensions = array('jpeg', 'jpg', 'png');

    foreach ($_FILES['image']['tmp_name'] as $i => $value) {
        $image = $_FILES['image']['name'][$i];
        $imageSize = $_FILES['image']['size'][$i];
        $temp_dir = $_FILES['image']['tmp_name'][$i];

        $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($imgExt, $valid_extensions)) {
            if ($imageSize < 5000000) {
                // if ($slider['slider_image']) {
                //     unlink('../../' . $slider['slider_image']);
                // }
                $picProfile = rand(1000, 1000000) . '.' . $imgExt;
                $upload_dir = 'images/product/' . $picProfile;
                $upload_File_dir = '../../images/product/' . $picProfile;
                move_uploaded_file($temp_dir, $upload_File_dir);
            }
        }

        $sqli = 'INSERT INTO vendor_productimages (productImages, product_id, create_at, update_at) 
        VALUE(:productImages, :product_id, :create_at, :update_at)';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':productImages', $upload_dir);
            $statements->bindValue(':product_id', $id);
            $statements->bindValue(':create_at', $date);
            $statements->bindValue(':update_at', $date);
            if ($statements->execute()) {
                header('Location: ../product/product.php');
            }
        }
    }

    if (empty($title_err)) {
       
    }
}

?>