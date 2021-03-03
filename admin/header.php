<?php
session_start();
if(empty($_SESSION['role'])){
    header("location:../index.php");
}
if($_SESSION['role'] == 'cashier'){
header("location:../index.php");}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>PharmacyManagmentSystem</title>
<!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/uploads/settings/login_image-324.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
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



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body style="background: #0A0E45" class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<nav style="background: #0A0E45" class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class=" nav-item mobile-menu d-md-none mr-auto"><a class=" text-white nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class=" nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="modern admin logo" src="../assets/uploads/settings/logo-597.png">
                        <h3 class="brand-text text-white">Pharmacy</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class=" nav-item d-none d-md-block"><a class=" text-white nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="text-white nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item text-white" ><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700 text-white"><?php echo $_SESSION['name']; ?></span><span class="avatar avatar-online">

                                <img src="../assets/images/avatar.svg" alt="avatar"><i></i>
                         </span></a>
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

<div style="background: #0A0E45;color: whitesmoke" class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
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
                    <li data-menu=""><a class="dropdown-item" href="report_store_index.php" data-toggle=""><i class="la la-archive"></i><span>Store Report</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="report_expire_index.php" data-toggle=""><i class="la la-group"></i><span>Expire Report</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="report_stock_index.php" data-toggle=""><i class="la la-exclamation-circle"></i><span>Out of stock Report</span></a>
                    </li>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="report_order_index.php" data-toggle=""><i class="la la-exclamation-circle"></i><span>Order Report</span></a>
                    </li>
                </ul>
            </li>

                <li class="nav-item"><a class="dropdown-toggle nav-link" href="notice"><i class="la la-cogs"></i><span>Notice</span></a>
                </li>


        </ul>
    </div>
</div>


