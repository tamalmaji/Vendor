<?php
    require_once "../function/slider/_update.php";
?>
<?php include_once "../includes/header.php" ?>
<div class=" content-wrapper" style="min-height: 485.139px;">
    <div class="row">
        <div class="col-12">
            <a href="slider.php" class="btn btn-outline-primary m-2">Back to Sider</a>
        </div>
        <div class="col-12">
            <img src="../../<?php echo $slider['slider_image'] ?>" alt="">
        </div>
        <div class="col-12 p-5">
            <?php include_once "./_form.php" ?>
        </div>
    </div>
</div>
<?php include_once "../includes/footer.php" ?>