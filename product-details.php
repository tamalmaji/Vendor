<?php
require_once "./function/_product-details.php";
?>
<?php include_once './includes/header.php' ?>

<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Product Details</h2>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BANNER SECTION -->

<!-- PAGE SECTION START -->
<div class="page-section section pt-100 pb-60">
    <div class="container">
        <div class="row mb-40">
            <div class="col-12 col-md-6 col-lg-4 mb-40">
                <!-- Tab panes -->
                <div class="tab-content mb-10">
                    <div class="pro-large-img tab-pane active" id="pro-large-img-1">
                        <img src="./<?php echo $product['productImages'] ?>" alt="Image" /></a>
                    </div>
                    <?php foreach ($productImgs as $i => $productImg) : ?>
                        <div class="pro-large-img tab-pane" id="pro-large-img-<?php echo $i + 1 ?>">
                            <img src="./<?php echo $productImg['productImages'] ?>" alt="Image" /></a>
                        </div>
                    <?php endforeach ?>

                </div>
                <!-- Nav tabs -->
                <div class="pro-thumb-img-slider nav">
                    <?php foreach ($productImgs as $i => $productImg) : ?>
                        <div><a href="#pro-large-img-<?php echo $i + 1 ?>" data-bs-toggle="tab">
                                <img src="./<?php echo $productImg['productImages'] ?>" alt="Image" style="height: 150px;" /></a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 mb-40">
                <div class="product-details">
                    <h2 class="title"><?php echo $shop['product_title'] ?></h2>
                    <span class="price section"><span class="new">₹ <?php echo $shop['product_dis_price'] ?> </span><span class="old">₹ <?php echo $shop['product_price'] ?></span></span>
                    <span class="availability section"><strong>available:</strong> <span class="in"><i class="fa fa-check"></i> In Stock</span>
                        <!--<span class="out"><i class="fa fa-times"></i> Out of Stock</span>-->
                    </span>
                    <div class="short-desc section">
                        <p><strong>Quick Overview:</strong> <?php echo $shop['product_desc'] ?> </p>
                    </div>
                    <div class="color-list section">
                        <button class="active" style="background-color: #855439;"><i class="fa fa-check"></i></button>
                        <button style="background-color: #FF6801;"><i class="fa fa-check"></i></button>
                        <button style="background-color: #DCDCDA;"><i class="fa fa-check"></i></button>
                    </div>
                    <ul class="usefull-link section">
                        <li><a href="#/"><i class="pe-7s-mail"></i> Email to a Friend</a></li>
                        <li><a href="wishlist.php"><i class="pe-7s-like"></i> Wishlist</a></li>
                        <li><a href="#"><i class="pe-7s-repeat"></i> Compare</a></li>
                    </ul>
                    <div class="quantity-cart section">
                        <div class="product-quantity">
                            <input type="text" value="0">
                        </div>
                        <button class="add-to-cart">add to cart</button>
                    </div>
                    <div class="share-icons section">
                        <a class="twitter" href="#/"><i class="fa fa-facebook"></i> facebook</a>
                        <a class="facebook" href="#/"><i class="fa fa-twitter"></i> twitter</a>
                        <a class="google" href="#/"><i class="fa fa-google-plus"></i> linkedin</a>
                        <a class="pinterest" href="#/"><i class="fa fa-pinterest"></i> facebook</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Nav tabs -->
            <div class="col-12">
                <ul class="pro-info-tab-list section nav">
                    <li><a class="active" href="#more-info" data-bs-toggle="tab">More info</a></li>
                    <!-- <li><a href="#data-sheet" data-bs-toggle="tab">Data sheet</a></li> -->
                    <li><a href="#reviews" data-bs-toggle="tab">Reviews</a></li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content col-12">
                <div class="pro-info-tab tab-pane active" id="more-info">
                    <p><?php echo $shop['product_desc'] ?></p>
                </div>
                <!-- <div class="pro-info-tab tab-pane" id="data-sheet">
                    <table class="table-data-sheet">
                        <tbody>
                            <tr class="odd">
                                <td>Compositions</td>
                                <td>Cotton</td>
                            </tr>
                            <tr class="even">
                                <td>Styles</td>
                                <td>Casual</td>
                            </tr>
                            <tr class="odd">
                                <td>Properties</td>
                                <td>Short Sleeve</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="pro-info-tab tab-pane" id="reviews">
                    <a href="product-details.php">Be the first to write your review!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->

<!-- PRODUCT SECTION START -->
<div class="product-section section pb-100">
    <div class="container">
        <div class="section-title text-center mb-70">
            <h2>related products</h2>
        </div>
        <div class="row">
            <div class="product-slider product-slider-4 slick-space">
                <?php foreach ($relatives as $i => $relative) :?>
                    <!-- product-item start -->
                    <div class="product-item text-center">
                        <div class="product-img">
                            <a class="image" href="product-details.php?id=<?php echo $relative['product_id'] ?>"><img src="./<?php echo $relative['product_img'] ?>" alt="" style="height: 300px;" /></a>
                            <a href="cart.php" class="add-to-cart">add to cart</a>
                            <div class="action-btn fix">
                                <a href="wishlist.php" title="Wishlist"><i class="pe-7s-like"></i></a>
                                <a href="product-details.php" title="Quickview"><i class="pe-7s-look"></i></a>
                                <a href="product-details.php" title="Compare"><i class="pe-7s-repeat"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="title"><a href="product-details.php?id=<?php echo $relative['product_id'] ?>"><?php echo $relative['product_title'] ?></a></h5>
                            <span class="price"><span class="new">₹ <?php $relative['product_price'] ?></span></span>
                        </div>
                    </div>
                    <!-- product-item end -->
                   
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT SECTION END -->

<?php include_once './includes/footer.php' ?>