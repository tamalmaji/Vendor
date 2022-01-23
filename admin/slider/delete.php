<?php
require_once "../../function/dbConnection.php";
$id = $_POST['id'] ?? NULL;
if (!$id) {
    header('Location: slider.php');
}


$sql = 'SELECT * FROM vendor_slider WHERE slider_id = :id';
if ($statement = $pdo->prepare($sql)) {
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        $slider = $statement->fetch(PDO::FETCH_ASSOC);
        if ($slider['slider_image']) {
            unlink('../../' . $slider['slider_image']);
        }
        $sqli = 'DELETE FROM vendor_slider WHERE slider_id = :id';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':id', $id);
            if ($statements->execute()) {
                header('Location: slider.php');
            }
        }
    }
}