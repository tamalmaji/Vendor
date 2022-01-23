<?php
require_once "../../function/dbConnection.php";
$id = $_GET['id'] ?? NULL;
if (!$id) {
    header('Location: userType.php');
}

$sqi = 'SELECT * FROM vendor_usertype WHERE userType_id = :id';
if ($statementss = $pdo->prepare($sqi)) {
    $statementss->bindValue(':id', $id);
    if ($statementss->execute()) {
        $userType = $statementss->fetch(PDO::FETCH_ASSOC);
    }
}

$title = $userType['userType_title'];
$date = date('Y-m-d H:i:s');

$title_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST);
    $title = trim($_POST['title']);

    if (empty($title)) {
        $title_err = 'Please Ener a userType';
    } 
    // else {
    //     $sql = 'SELECT userType_id FROM vendor_usertype WHERE userType_title = :title';
    //     if ($statement = $pdo->prepare($sql)) {
    //         $statement->bindValue(':title', $title);
    //         if ($statement->execute()) {
    //             if ($statement->rowCount() === 1) {
    //                 $title_err = 'userType alrady Exits';
    //             }
    //         } else {
    //             die('Somthing Went Wrong');
    //         }
    //     }
    //     unset($statement);
    // }
    if (empty($title_err)) {
        $sqli = 'UPDATE vendor_usertype SET userType_title = :userType_title, update_at = :update_at WHERE userType_id = :id';
        if ($statements = $pdo->prepare($sqli)) {
            $statements->bindValue(':userType_title', $title);
            $statements->bindValue(':update_at', $date);
            $statements->bindValue(':id', $id);
            if ($statements->execute()) {
                header('Location: userType.php');
            }
        }
    }
}

?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="userType.php" class="btn btn-outline-primary m-2">Back to userType</a>
        </div>
        <div class="col-12 p-5">
            <?php include_once "./_form.php" ?>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>