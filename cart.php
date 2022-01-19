<?php include_once "./includes/header.php" ?>
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-xs-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BANNER SECTION -->
    
<!-- PAGE SECTION START -->
<div class="page-section section pt-100 pb-60">
    <div class="container">
        <form action="#">	
            <div class="row">		
                <div class="col-xs-12">
                    <div class="cart-table table-responsive mb-40">
                        <table>
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pro-thumbnail"><a href="product-details.php"><img src="img/product/1.jpg" alt="Image"/></a></td>
                                    <td class="pro-title"><a href="product-details.php">Le Parc Minotti Chair</a></td>
                                    <td class="pro-price"><span class="amount">$169.00</span></td>
                                    <td class="pro-quantity"><div class="product-quantity"><input type="text" value="1" /></div></td>
                                    <td class="pro-subtotal">$169.00</td>
                                    <td class="pro-remove"><a href="#/">×</a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="product-details.php"><img src="img/product/2.jpg" alt="Image"/></a></td>
                                    <td class="pro-title"><a href="product-details.php">DSR Eiffel chair</a></td>
                                    <td class="pro-price"><span class="amount">$137.00</span></td>
                                    <td class="pro-quantity"><div class="product-quantity"><input type="text" value="1" /></div></td>
                                    <td class="pro-subtotal">$137.00</td>
                                    <td class="pro-remove"><a href="#/">×</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="cart-buttons mb-30">
                        <input type="submit" value="Update Cart" />
                        <a href="shop.php">Continue Shopping</a>
                    </div>
                    <div class="cart-coupon mb-40">
                        <h4>Coupon</h4>
                        <p>Enter your coupon code if you have one.</p>
                        <input type="text" placeholder="Coupon code" />
                        <input type="submit" value="Apply Coupon" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="cart-total mb-40">
                        <h3>Cart Totals</h3>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="amount">$306.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <strong><span class="amount">$306.00</span></strong>
                                    </td>
                                </tr>											
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout section mt-30">
                            <a href="#/">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>  
        </form>
    </div>
</div>
<!-- PAGE SECTION END --> 
  <?php include_once "./includes/footer.php" ?>