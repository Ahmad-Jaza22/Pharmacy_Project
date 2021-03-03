<?php
require_once('../assets/constants/config.php');
include('header.php');
include('db.php');
include('function.php');
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Sales</h3>
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
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>

                                    <div class="table-responsive">
                                        <br />
                                        <br /><br />
                                        <table id="user_data" class="table table-bordered table-striped  ">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Purchase_price</th>
                                                <th>Sale_price</th>
                                                <th>quantity</th>
                                                <th>subtotal</th>
                                                <th>withdiscount</th>
                                                <th>profit</th>
                                                <th>expire</th>
                                                <th>type</th>
                                                <th>brand</th>
                                                <th>saledate</th>
                                                <th >Delet</th>

                                            </tr>
                                            </thead>
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
<?php include 'footer.php'; ?>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('#add_button').click(function(){
            $('#user_form')[0].reset();
            // $('.modal-title').text("Add User");
            $('#action').val("Add");
            $('#operation').val("Add");
            //  $('#user_uploaded_image').html('');
        });

        var dataTable = $('#user_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"saledfetch.php",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false,
                },
            ],

        });


        $(document).on('click', '.delete', function(){
            swal({
                title: "Are you sure?",
                text: "To Delete This Record!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Delete",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
                .then((isConfirm) => {
                    if (isConfirm) {
                        var id = $(this).attr("id");
                        $.ajax({
                            url:"saleddelete.php",
                            method:"POST",
                            data:{id:id},
                            success:function(data)
                            {
                                swal("Deleted!", "Your Record has been deleted.", "success");

                                dataTable.ajax.reload();//to relod table

                            }
                        });

                    } else {
                        swal("Cancelled", "Your Record is safe", "error");
                    }
                });
        });


    });
</script>

