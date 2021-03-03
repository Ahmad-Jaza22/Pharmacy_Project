<?php
require_once('../assets/constants/config.php');


session_start();
if(empty($_SESSION['role'])){
    header("location:../index.php");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?=$title?></title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/uploads/settings/<?=$fevicon?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/selects/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/extensions/sweetalert.css">
<style>
    .change{
        background: #0A0E45;
color: white;
    }

</style>


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns change " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class=" change header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="modern admin logo" src="../assets/uploads/settings/<?=$logo?>">
                        <h3 class="brand-text">Pharmacy</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?php echo $_SESSION['name']; ?></span><span class="avatar avatar-online">
                    <li class="dropdown dropdown-user nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="modern admin logo" src="../assets/uploads/settings/<?=$logo?>">

                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="account"><i class="ft-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<div style="background: #0A0E45" class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="index.php"><i class="la la-home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-medkit"></i><span>Medicinals</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="manage" data-toggle=""><i class="la la-edit"></i><span>Store</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="outstock.php" data-toggle=""><i class="la la-archive"></i><span>Out Stock</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="expired.php" data-toggle=""><i class="la la-exclamation-circle"></i><span>Expired</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="order.php" data-toggle=""><i class="la la-list"></i><span>Order List</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="sales"><i class="la la-money"></i><span>POS</span></a>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="saled"><i class="la la-rupee"></i><span>Sales</span></a>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="type"><i class="la la-tags"></i><span>Type</span></a>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="suppliers"><i class="la la-truck"></i><span>Suppliers</span></a>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="brand"><i class="la la-users"></i><span>Brand</span></a>
            </li>
            <li class="nav-item"><a class="dropdown-toggle nav-link" href="users"><i class="la la-user-plus"></i><span>Users</span></a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="" data-toggle="dropdown"><i class="la la-medkit"></i><span>Reports</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="report_sale_index.php" data-toggle=""><i class="la la-edit"></i><span>Sales Report</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="purchase_report" data-toggle=""><i class="la la-archive"></i><span>Purchase Report</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="customer_report" data-toggle=""><i class="la la-group"></i><span>Expire Report</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="purchase_report?expired=1" data-toggle=""><i class="la la-exclamation-circle"></i><span>Out of stock Report</span></a>
                    </li>
                </ul>
            </li>

                <li class="nav-item"><a class="dropdown-toggle nav-link" href="notice"><i class="la la-cogs"></i><span>Notice</span></a>
                </li>


        </ul>
    </div>
</div>

<?php
include('db.php');
include('function.php');
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row ">
            <div class="content-header-left col-md-6 col-12 ">
                <h3 class="content-header-title text-white">Sale medicince</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div style="background: #0A0E45">
                            <div class="row mb-2">
                                <div class="col-lg-5">
                                    <input type="text" id="pr_search" class="form-control" name="pr_search" placeholder="search for prodcut by barcode" onload="focus()">

                                </div>
                                <div class="">
                                    <button class="btn border-info text-info"><i class="la la-search"></i></button>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" id="pr_search_name" class="form-control" name="pr_search_name" placeholder="search for prodcut By name">

                                </div>
                                <div class="col-lg-1">
                                    <button type="button" id="delete_all" class="btn btn-outline-warning delete_all" style="width: 100%"><i class="la la-trash"></i> ALL</button>

                                </div>

                            </div>
                            </div>
                            <div class="card-content collapse show" >
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap" style="border-radius: 10px">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>

                                    <div class="table-responsive">



                                     <br>
                                        <table id="user_data" class="table table-bordered table-striped text-dark">
                                            <thead>
                                            <tr>
                                                <th>remove</th>
                                                <th>Name</th>
                                                <th>Purchase_price</th>
                                                <th>Sale_price</th>

                                                <th>quantity</th>
                                                <th>subTotal</th>
                                                <th>stock</th>
                                                <th>expire</th>
                                                <th>type</th>
                                                <th>brand</th>


                                            </tr>
                                            </thead>
                                        </table>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>
                                    <div class="form-group">
                                        <label class="label-control">Total :</label><br>
                                        <input type="text" id="total" value="0" class="form-control" placeholder="Total">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Discount :</label><br>
                                        <input type="text" id="discount" value="0" class="form-control" placeholder="Total">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Grand Total :</label><br>
                                        <input type="text" id="grand-total" class="form-control" placeholder="Total">
                                    </div>&nbsp;
                                    <button type="button" id="purchase" class="btn btn-success btn_purchase" style="width: 100%"><i class="la la-shopping-cart"></i> Sale</button>

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
<?php include 'footer.php'; ?>




<script type="text/javascript" language="javascript" >


    $(document).ready(function(){
        //start fetching total price
        $.ajax({
            url:"totalfetch.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                $('#total').val(data.total);
            }
        });
        //end fetching total price

        $('#pr_search').focus();


        var dataTable = $('#user_data').DataTable({

            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"salefetch.php",
                type:"POST"

            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false,
                },
            ],

        });






        $('#pr_search').on('keyup', function(){

            var barcode = $('#pr_search').val();

                $.ajax({
                    url:"saleinsert.php",
                    method:'POST',
                    data:{barcode:barcode},
                    success:function()
                    {
                        dataTable.ajax.reload();

                        for(var i=1; i<2;i++){
                            $('#pr_search').val('');
                        }

                        //start fetching total price
                        $.ajax({
                            url:"totalfetch.php",
                            method:"POST",
                            dataType:"json",
                            success:function(data)
                            {
                                $('#total').val(data.total);
                            }
                        });
                        //end fetching total price

                    }
                });

        });
        $('#pr_search').on('keyup', function(){
            $('#pr_search').val('');
        });
        $('#pr_search_name').on('keyup', function(){

            var barcode = $('#pr_search_name').val();

            $.ajax({
                url:"saleinsert.php",
                method:'POST',
                data:{barcode:barcode},
                success:function()
                {

                    dataTable.ajax.reload();


                    //start fetching total price
                    $.ajax({
                        url:"totalfetch.php",
                        method:"POST",
                        dataType:"json",
                        success:function(data)
                        {
                            $('#total').val(data.total);
                        }
                    });
                    //end fetching total price


                }
            });

        });

        $(document).on('click', '.delete', function(){


                        var id = $(this).attr("id");
                        $.ajax({
                            url:"saleinsert.php",
                            method:"POST",
                            data:{id:id},
                            success:function()
                            {

                                    dataTable.ajax.reload();//to relod table


                                //start fetching total price
                                $.ajax({
                                    url:"totalfetch.php",
                                    method:"POST",
                                    dataType:"json",
                                    success:function(data)
                                    {
                                        $('#total').val(data.total);
                                    }
                                });
                                //end fetching total price

                                }
                            });




        });

        $(document).on('click', '.delete_all', function(){


            var delete_all = $(this).attr("id");
            $.ajax({
                url:"saleinsert.php",
                method:"POST",
                data:{delete_all:delete_all},
                success:function()
                {

                    dataTable.ajax.reload();//to relod table

                    //start fetching total price
                    $.ajax({
                        url:"totalfetch.php",
                        method:"POST",
                        dataType:"json",
                        success:function(data)
                        {
                            $('#total').val(data.total);
                        }
                    });
                    //end fetching total price
                }
            });




        });
        $(document).on('click', '.plus_btn', function(){


            var id = $(this).attr("id");

            $.ajax({
                url:"saleplus.php",
                method:"POST",
                data:{id:id},
                success:function()
                {

                    dataTable.ajax.reload();//to relod table

                    //start fetching total price
                    $.ajax({
                        url:"totalfetch.php",
                        method:"POST",
                        dataType:"json",
                        success:function(data)
                        {
                            $('#total').val(data.total);
                        }
                    });
                    //end fetching total price
                }
            });



        });
        $(document).on('click', '.btn_minus', function(){


            var id = $(this).attr("id");

            $.ajax({
                url:"saleminus.php",
                method:"POST",
                data:{id:id},
                success:function()
                {

                    dataTable.ajax.reload();//to relod table

                    //start fetching total price
                    $.ajax({
                        url:"totalfetch.php",
                        method:"POST",
                        dataType:"json",
                        success:function(data)
                        {
                            $('#total').val(data.total);
                        }
                    });
                    //end fetching total price
                }
            });



        });

        $(document).on('click', '.btn_purchase', function(){

            var disc = $('#discount').val();
           // alert(disc);

                $.ajax({
                    url: "purchaseinsert.php",
                    method: "POST",
                    data:{disc:disc},

                    success: function () {


                        swal("Purchased!", "Your Record has been Purchased.", "success");
                        setTimeout(function(){// wait for 5 secs(2)
                           // location.reload(); // then reload the page.(3)
                        }, 100);

                        dataTable.ajax.reload();//to relod table
                        $('#discount').val(0);
                        $('#grand-total').val(0);

                        //start fetching total price
                        $.ajax({
                            url: "totalfetch.php",
                            method: "POST",
                            dataType: "json",
                            success: function (data) {
                                $('#total').val(data.total);
                            }
                        });
                        //end fetching total price
                    }
                });




        });

        $('#discount').on('keyup keydown click',function(){
            var total = $("#total").val();
            var discount = $('#discount').val();
            if(discount < 0){
                $('#discount').val(0);
            }
            else {

                var grandtotal = total - discount;
                $('#grand-total').val(grandtotal);
            }
        });

    });
</script>

