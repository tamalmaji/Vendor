<?php
require_once "../function/product/_product.php";
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
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="add.php" class="btn btn-outline-primary btn-sm">Add product</a>
                <br>
                <br>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Products </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>price</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $i => $product) : ?>
                                    <tr>
                                        <td><?php echo $i + 1 ?></td>
                                        <td><?php echo $product['product_title'] ?></td>
                                        <td class="product-details">
                                            <span class="price section">
                                                <span class="new"><?php echo $product['product_dis_price'] ?></span>
                                                <span class="old" style="color: #999; text-decoration: line-through;">$<?php echo $product['product_price'] ?></span>
                                            </span>
                                            
                                        </td>
                                        <td><?php echo $product['create_at'] ?></td>
                                        <td>
                                            <a href="View.php?id=<?php echo $product['product_id'] ?>" class="btn btn-success btn-xs">View</a>
                                            <a href="update.php?id=<?php echo $product['product_id'] ?>" class="btn btn-info btn-xs">Edit</a>
                                            <form action="delete.php" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $noOfPages ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                        <?php if ($page > 1) : ?>
                            <li class="paginate_button page-item previous" id="example1_previous"><a href="product.php?page=<?php echo ($page - 1) ?>" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <?php endif ?>
                        <?php for ($i = 1; $i < $total_pages; $i++) : ?>
                            <?php if ($i == $page) { ?>

                                <li class="paginate_button page-item active"><a href="product.php?page=<?php echo $i ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                            <?php } else { ?>
                                <li class="paginate_button page-item"><a href="product.php?page=<?php echo $i ?>" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                            <?php } ?>
                        <?php endfor ?>
                        <?php if ($i > $page) : ?>
                            <li class="paginate_button page-item next" id="example1_next"><a href="product.php?page=<?php echo ($page + 1) ?>" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../includes/footer.php" ?>