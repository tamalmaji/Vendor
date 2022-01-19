<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Furnish - Minimalist Furniture Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- All CSS Files -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Icon Font -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/pe-icon-7-stroke.css">
    <!-- Plugins css file -->
    <link rel="stylesheet" href="../css/plugins.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../style/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- Modernizr JS -->
    <script src="../js/vendor/modernizr-3.11.2.min.js"></script>

</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER SECTION -->
        <header class="header-section section sticker header-transparent">
            <div class="container-fluid">
                <div class="row">
                    <!-- logo -->
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="header-logo">
                            <a href="../index.php">
                                <img src="../images/ecommerce-logo.png" alt="main logo" style="width: 80px;">
                            </a>
                        </div>
                    </div>
                    <!-- primary-menu -->
                    <div class="col-lg-8 col-12 d-none d-lg-block">
                        <nav class="main-menu text-center">
                            <ul>
                                <li class="active">
                                    <a href="../index.php">Home</a>
                                </li>
                                <li>
                                    <a href="../shop.php">shop</a>
                                </li>
                                <li>
                                    <a href="../blog.php">Blog</a>
                                </li>
                                <li>
                                    <a href="../contact.php">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- header-search & total-cart -->
                    <div class="col-lg-2 col-sm-8 col-6">
                        <div class="header-option-btns float-end">
                            <!-- header-search -->
                            <div class="header-search float-start">
                                <button class="search-toggle" data-bs-toggle="modal" data-bs-target="#myModal"><i class="pe-7s-search"></i></button>
                            </div>
                            <!-- header Account -->
                            <div class="header-account float-start">
                                <ul>
                                    <li><a class="dropdown-toggle" href="#" id="dropdownAccountBtn" data-bs-toggle="dropdown" aria-expanded="false"><i class="pe-7s-config"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownAccountBtn">
                                            <li><a href="login.php">Log in</a></li>
                                            <li><a href="register.php">Register</a></li>
                                            <li><a href="changPassword.php">Chang Password</a></li>
                                            <li><a href="address.php">My Address</a></li>
                                            <li><a href="wishlist.php">Wish list</a></li>
                                            <li><a href="checkout.php">Checkout</a></li>
                                            <li><a href="order.php">Order</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Header Cart -->
                            <div class="header-cart float-start">
                                <!-- Cart Toggle -->
                                <a class="cart-toggle dropdown-toggle" href="#" data-toggle="dropdown" id="dropdownCartBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="pe-7s-cart"></i>
                                    <span>2</span>
                                </a>
                                <!-- Mini Cart Brief -->
                                <div class="mini-cart-brief dropdown-menu" aria-labelledby="dropdownCartBtn">
                                    <div class="cart-items">
                                        <p>You have <span>2 items</span> in your shopping bag</p>
                                    </div>
                                    <!-- Cart Products -->
                                    <div class="all-cart-product clearfix">
                                        <div class="single-cart clearfix">
                                            <div class="cart-image">
                                                <a href="product-details.php"><img src="../images/product/cart-1.jpg" alt="Image"></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="product-details.php">Le Parc Minotti Chair</a></h5>
                                                <p>Price : £9.00</p>
                                                <p>Qty : 1</p>
                                                <a href="#" class="cart-delete" title="Remove this item"><i class="pe-7s-trash"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-cart clearfix">
                                            <div class="cart-image">
                                                <a href="product-details.php"><img src="../images/product/cart-2.jpg" alt="Image"></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="product-details.php">DSR Eiffel chair</a></h5>
                                                <p>Price : £9.00</p>
                                                <p>Qty : 1</p>
                                                <a href="#" class="cart-delete" title="Remove this item"><i class="pe-7s-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Cart Total -->
                                    <div class="cart-totals">
                                        <h5>Total <span>£12.00</span></h5>
                                    </div>
                                    <!-- Cart Button -->
                                    <div class="cart-bottom  clearfix">
                                        <a href="checkout.php">Check out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Nav -->
                <div class="mobile-menu"></div>
            </div>
        </header>
        <!-- END HEADER SECTION -->

        <!-- Search Modal -->
        <div class="search-modal modal fade text-center" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <button type="button" class="btn-modal-close" data-bs-dismiss="modal"><i class="pe-7s-close"></i></button>
                    <div class="header-search-form">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>