<?php
session_start();
if(empty($_SESSION['role'])){
    header("location:../index.php");
}
if($_SESSION['role'] == 'cashier'){
    header("location:../index.php");}
?>

<!doctype html>
<html lang="en">
<!-- source video link: https://www.youtube.com/watch?v=8ZSVNzY5M24&list=WL&index=1&t=1696s -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />

    <title>report</title>
</head>

<body style="background: #0A0E45;color:white">

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <h1 class="text-center">Store Report</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <a href="index.php" class="btn btn-outline-primary  mr-4"><i class="fa fa-backward  "></i> back</a>

                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                    class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                        </div>

                        <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button id="filter" class="btn btn-outline-info btn-sm"><i class="fa fa-filter"></i>    Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm"><i class="fa fa-spinner"></i> Reset</button>
                </div>

            </div>

            <div class="row mt-3 p-3" style="background: white;color:#0A0E45;border-radius: 10px">
                <div class="col-md-12">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table  display nowrap" id="records" style="width:100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>type</th>
                                <th>brand</th>
                                <th>Purchase_price</th>
                                <th>Sale_price</th>
                                <th>Expire</th>
                                <th>add_Date</th>
                                <th>Quantity</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<!-- Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<!-- Momentjs -->

<script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
</script>

<script>


    // Fetch records

    function fetch(start_date, end_date) {
        $.ajax({
            url: "report_expire_records.php",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";

                $('#records').DataTable({
                    "data": data,
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    // responsive
                    "responsive": true,
                    "columns": [{
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return i++;
                        }
                    },
                        {
                            "data": "name"
                        },
                        {
                            "data": "type",
                            "render": function(data, type, row, meta) {
                                return `${row.type}`;
                            }
                        } , {
                            "data": "brand",
                            "render": function(data, type, row, meta) {
                                return `${row.brand}`;
                            }
                        } , {
                            "data": "p_price",
                            "render": function(data, type, row, meta) {
                                return `${row.p_price}`;
                            }
                        } ,   {
                            "data": "s_price",
                            "render": function(data, type, row, meta) {
                                return `${row.s_price}`;
                            }
                        },    {
                            "data": "expire",
                            "render": function(data, type, row, meta) {
                                return `${row.expire}`;
                            }
                        },    {
                            "data": "adddate",
                            "render": function(data, type, row, meta) {
                                return `${row.add_date}`;
                            }
                        },    {
                            "data": "qty",
                            "render": function(data, type, row, meta) {
                                return `${row.quantity}`;
                            }
                        },
                        /*

                           {
                            "data": "",
                            "render": function(data, type, row, meta) {
                                return `${row.}`;
                            }
                        },
                        */
                    ]
                });
            }
        });
    }
    fetch();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("both date required");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        $('#purchaseofdate').hide();
        e.preventDefault();
        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().destroy();
        fetch();
    });
</script>
</body>

</html>