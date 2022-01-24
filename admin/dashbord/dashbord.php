<?php
require_once "../function/dashbord/_dashbord.php";
require_once "../function/order/_orderLimit.php";
?>

<?php include_once "../includes/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">DashBord</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active">DashBord</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="text-center"><?php echo $catagory ?></h3>

              <p class="text-center">Catagorys</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="../catagory/catagory.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 class="text-center"><?php echo $userType ?></h3>

              <p class="text-center">User Type</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="../userType/userType.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3 class="text-center"><?php echo $product ?></h3>

              <p class="text-center">Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="../product/product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 class="text-center"><?php echo $slider ?></h3>

              <p>Slider</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../users/users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 class="text-center"><?php echo $user ?></h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../users/users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3 class="text-center"><?php echo $orderIds ?></h3>

              <p>Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../order/order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Order Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($orderts as $i => $ordert) : ?>
                    <tr>
                      <?php 
                        require_once "../function/order/_porDtales.php";
                        
                      ?>
                      <td><?php echo $i +1 ?></td>
                      <td><a href="#"><?php echo $ordert['user_order_id'] ?></a></td>
                      <td><?php echo $productOrder['product_title'] ?></td>
                      <td><span class="badge badge-success"><?php echo $ordert['order_status'] ?></span></td>
                      <td>
                        <div class="sparkbar"><?php echo $ordert['create_at']  ?></div>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="../order/order.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once "../includes/footer.php" ?>