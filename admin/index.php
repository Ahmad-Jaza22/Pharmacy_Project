<?php
require_once('../assets/constants/config.php');
include('header.php');
include('db.php');


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body mt-1 ">
            <section id="dom">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php// require_once('../assets/constants/check-reply.php') ;?>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php
                                            $statement = $connection->prepare("SELECT * FROM medicine");
                                            $statement->execute();
                                            $result = $statement->fetchAll();
                                            $i = 0 ;
                                            foreach($result as $row) {
                                                $quantity = $row["quantity"];
                                                if ($quantity == 0) {
                                                  $i++;
                                                }
                                            }

                                            ?>

                                            <h1 class="text-primary"><?php echo $i ;?></h1>

                                        </div>

                                        <div class="col-lg-4">
                                            <img style="width:50px" src="../assets/images/Gear-0.7s-200px%20(1).gif">

                                        </div>

                                    </div>
                                    <h4>Out Of Stock</h4>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">


                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php// require_once('../assets/constants/check-reply.php') ;?>

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php
                                            $statement = $connection->prepare("SELECT * FROM medicine");
                                            $statement->execute();
                                            $result = $statement->fetchAll();
                                            $i = 0 ;
                                            foreach($result as $row) {

                                                $current_date = date('Y-m-d');
                                                $expire = $row["expire"];
                                                $current_date = strtotime($current_date);
                                                $expire_date = strtotime($row["expire"]);
                                                if ($current_date >= $expire_date) {
                                                    $i++;
                                                }
                                            }

                                            ?>

                                            <h1 class="text-primary"><?php echo $i ;?></h1>

                                        </div>

                                        <div class="col-lg-4">
                                            <img style="width:50px" src="../assets/images/Ripple-0.9s-254px.gif">

                                        </div>

                                    </div>
                                    <h4>Expired</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php
                                            $statement = $connection->prepare("SELECT * FROM notice");
                                            $statement->execute();
                                            $result = $statement->fetchAll();
                                            $i = 0 ;
                                            foreach($result as $row) {
                                              $i++;
                                            }

                                            ?>

                                            <h1 class="text-primary"><?php echo $i ;?></h1>

                                        </div>

                                        <div class="col-lg-4">
                                            <img style="width:50px" src="../assets/images/Discuss-1.3s-254px.gif">

                                        </div>

                                    </div>
                                    <h4>Notice</h4>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">


                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <?php
                                            $statement = $connection->prepare("SELECT * FROM order_tbl");
                                            $statement->execute();
                                            $result = $statement->fetchAll();
                                            $i = 0 ;
                                            foreach($result as $row) {
                                              $i++;
                                            }

                                            ?>

                                            <h1 class="text-primary"><?php echo $i ;?></h1>

                                        </div>

                                        <div class="col-lg-4">
                                            <img style="width:50px" src="../assets/images/Infinity-3.2s-200px.gif">

                                        </div>

                                    </div>
                                    <h4>Order List</h4>

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <div class="row">

                                        <div class="col-lg-9">
                                            <a href="sales.php">
                                            <h5 class="text-primary">Sale</h5>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="sales.php">
                                            <img style="width:30px" src="../assets/images/cart.png">
                                            </a>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <a href="manage.php">
                                            <h5 class="text-primary"> Store</h5>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="manage.php">
                                            <img style="width:30px" src="../assets/images/pills.png">
                                            </a>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <a href="order.php">
                                            <h5 class="text-primary"> Order</h5>
                                            </a>
                                        </div>

                                        <div class="col-lg-3">
                                            <a href="order.php">
                                            <img style="width:30px" src="../assets/images/add.png">
                                            </a>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <a href="suppliers.php">
                                            <h5 class="text-primary"> Supplier</h5>
                                            </a>

                                        </div>

                                        <div class="col-lg-3">
                                            <a href="suppliers.php">
                                            <img style="width:30px" src="../assets/images/button.png">
                                            </a>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
          <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
<div class="row">
    <div class="col-lg-6">
                                   <img style="width:200%" class="" src="../assets/images/141663198-vector-illustration-pharmacist-at-counter-in-pharmacy-pharmacy-with-pharmacist-in-counter-and-people.jpg" alt="" /> 
                                    </div>
                                    </div>
                                </div>
                        </div>
                           



                    </div>
</div>
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">

                                    <div class="row">
                                        <?php

                                        include('db.php');
                                        $output = array();

                                        $current_date =date('Y-m');

                                        $statement = $connection->prepare(
                                            "SELECT * FROM sales WHERE sale_month = '".$current_date."' "
                                        );
                                        $statement->execute();
                                        $result = $statement->fetchAll();
                                        $profit = 0;
                                        $sale_month = 0 ;
                                        foreach($result as $row)
                                        {
                                            $sale_month = $sale_month + $row["with_discount"];
                                            $profit = $profit + $row["profit"];
                                            //$ = $row[""];
                                        }

                                        ?>
                                        <div class="col-lg-6">
                                            <button class="btn border-danger">
                                                <h4 class="text-primary">Sale<br> of this Month</h4>
                                                <h2 class="text-danger"><?php echo $sale_month ;?></h2>
                                            </button>
                                        </div>

                                        <div class="col-lg-6">
                                            <button class="btn border-success">
                                                <h4 class="text-primary">Profit <br>of this Month</h4>
                                                <h2 class="text-success"><?php echo $profit ; ?></h2>
                                            </button>
                                        </div>

                                    </div>

                                        <br><br>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Today Expired</h3>

            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>quantity</th>
                                                <th>Expire Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=1;
                                            $statement = $connection->prepare("SELECT * FROM medicine");
                                            $statement->execute();
                                            $result = $statement->fetchAll();

                                            foreach($result as $row) {

                                                $current_date = date('Y-m-d');
                                                $expire = $row["expire"];
                                                $current_date = strtotime($current_date);
                                                $expire_date = strtotime($row["expire"]);
                                                if ($current_date == $expire_date) {



                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row['name']?></td>
                                                    <td><?=$row['price']?></td>
                                                    <td><?=$row['quantity']?></td>
                                                    <td><?=$row['expire']?></td>

                                                </tr>
                                                <?php $i++; }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- DOM - jQuery events table -->
        </div>
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Content-->
<div class="app-content content" style="margin-top: -25%">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Today Out Of Stock</h3>

            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>quantity</th>
                                                <th>Expire Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=1;
                                            $statement = $connection->prepare("SELECT * FROM medicine");
                                            $statement->execute();
                                            $result = $statement->fetchAll();

                                            foreach($result as $row) {

                                                $quantity = $row["quantity"];
                                                if ($quantity == 0) {



                                                    ?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$row['name']?></td>
                                                        <!-- <td><?=$row['price']?></td> -->
                                                        <td><?=$row['quantity']?></td>
                                                        <td><?=$row['expire']?></td>

                                                    </tr>
                                                    <?php $i++; }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- DOM - jQuery events table -->
        </div>
    </div>
</div>
<!-- END: Content-->
<?php  include 'footer.php'; ?>