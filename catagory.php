<?php
    require_once "./function/_catagory.php";
?>

<?php include_once './includes/header.php' ?>
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BANNER SECTION -->

<!-- PAGE SECTION START -->
<div class="page-section section pt-100 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12 order-lg-1 order-0">
                <div class="shop-bar mb-6">
                    <ul class="shop-tablist nav">
                        <li><a class="active" href="#product-grid" data-bs-toggle="tab"><i class="fa fa-th"></i></a></li>
                        <li><a href="#product-list" data-bs-toggle="tab"><i class="fa fa-list"></i></a></li>
                    </ul>
                    <div class="item-per-page">
                        <select>
                            <option value="1">9 items/pages</option>
                            <option value="2">12 items/pages</option>
                            <option value="3">15 items/pages</option>
                            <option value="4">18 items/pages</option>
                        </select>
                    </div>
                    <p>show item 1-9 of 36</p>
                </div>
                <div class="tab-content section">
                    <div class="tab-pane active" id="product-grid">
                        <div class="row">
                            <?php foreach ($shops as $i => $shop) : ?>
                                <!-- product-item start -->
                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12 mb-8">
                                    <div class="product-item text-center">
                                        <div class="product-img">
                                            <a class="image" href="product-details.php"><img src="./<?php echo $shop['product_img'] ?>" alt="" style="height: 300px" /></a>

                                            <a href="cart.php" class="add-to-cart">add to cart</a>
                                            <div class="action-btn fix">
                                                <a href="wishlist.php" title="Wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="product-details.php" title="Quickview"><i class="pe-7s-look"></i></a>
                                                <a href="product-details.php" title="Compare"><i class="pe-7s-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="title"><a href="product-details.php"><?php echo $shop['product_title'] ?></a></h5>
                                            <span class="price"><span class="new">₹ <?php echo $shop['product_dis_price'] ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                            <?php endforeach ?>


                        </div>
                    </div>
                    <div class="tab-pane" id="product-list">
                        <div class="row">
                            <!-- list product-item start -->
                            <?php foreach ($shops as $i => $shop) : ?>
                                <div class="col-xs-12 mb-40">
                                    <div class="list-product-item">
                                        <div class="list-product-img">
                                            <a class="image" href="product-details.php"><img src="./<?php echo $shop['product_img'] ?>" alt="" /></a>
                                        </div>
                                        <div class="list-product-info fix">
                                            <h2 class="title"><a href="product-details.php"><?php echo $shop['product_title'] ?></a></h2>
                                            <span class="price"><span class="new">₹ <?php echo $shop['product_dis_price'] ?></span></span>
                                            <p>
                                                <?php echo $shop['product_desc'] ?>
                                            </p>
                                            <div class="list-action-btn fix">
                                                <a href="cart.php" class="add-to-cart">add to cart</a>
                                                <a href="wishlist.php" title="Wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="product-details.php" data-bs-toggle="modal" data-bs-target="#productModal" title="Quickview"><i class="pe-7s-look"></i></a>
                                                <a href="product-details.php" title="Compare"><i class="pe-7s-repeat"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- list product-item end -->
                            <?php endforeach ?>
                            <div class="page-pagination text-center col-xs-12 fix mb-40">
                                <ul>
                                    <li><a href="shop.php"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="shop.php">1</a></li>
                                    <li><a href="shop.php">2</a></li>
                                    <li><a href="shop.php">3</a></li>
                                    <li><a href="shop.php">4</a></li>
                                    <li><a href="shop.php"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-12 order-lg-0 order-1">

                <div class="single-sidebar mb-8">
                    <form action="#" class="sidebar-search">
                        <input type="text" placeholder="Search here...">
                        <button class="submit"><i class="pe-7s-search"></i></button>
                    </form>
                </div>

                <div class="single-sidebar mb-8">
                    <h3 class="sidebar-title">Category</h3>
                    <ul class="category-sidebar">
                        <?php foreach ($catagorys as $key => $catagory) : ?>
                            <li><a href="catagory.php?id=<?php echo $catagory['catagory_id'] ?>"><?php echo $catagory['catagory_title'] ?></a></li>
                        <?php endforeach ?>
                        <?php foreach ($types as $key => $type) : ?>
                            <li><a href="type.php?id=<?php echo $type['for_id'] ?>"><?php echo $type['for_title'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="single-sidebar mb-8">
                    <h3 class="sidebar-title">Ranges</h3>
                    <div id="price-range"></div>
                </div>

                <div class="single-sidebar mb-8">
                    <h3 class="sidebar-title">Color</h3>
                    <!-- <ul class="color-sidebar">
                        <li><a href="shop.php"><i style="background-color: #0000FF;"></i><span>blue</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #DCDCDA;"></i><span>gray</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #855439;"></i><span>brown</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #50B948;"></i><span>green</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #FF0000;"></i><span>red</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #FF6801;"></i><span>orange</span></a></li>
                        <li><a href="shop.php"><i style="background-color: #000000;"></i><span>black</span></a></li>
                    </ul> -->
                </div>

                <div class="single-sidebar mb-8">
                    <h3 class="sidebar-title">Popular Tags</h3>
                    <div class="tag-cloud">
                        <?php foreach ($catagorys as $key => $catagory) : ?>
                            <a href="catagory.php?id=<?php echo $catagory['catagory_id'] ?>"><?php echo $catagory['catagory_title'] ?></a>
                    <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->

<?php include_once './includes/footer.php' ?>