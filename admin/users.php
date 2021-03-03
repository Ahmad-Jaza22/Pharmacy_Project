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
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Users</h3>

            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <div align="left">
                                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-outline-info "><i class="la la-plus-circle"> </i>  Add</button>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>

                                    <div class="table-responsive">

                                        <table id="user_data" class="table table-bordered table-striped ">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Edit</th>
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

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-body">


                    <input type="text" name="name" id="name" class="form-control" placeholder="name" />
                    <br />
                    <input type="text" name="pass" id="pass" class="form-control" placeholder="password" />
                    <br />

                    <div class="form-group">
                        <label>Enter role :</label>
                        <select name="role" id="role" class="form-control">

                                <option value="admin">admin</option>
                            <option value="cashier">cashier</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                url:"userfetch.php",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false,
                },
            ],

        });

        $(document).on('submit', '#user_form', function(event){
            event.preventDefault();

            var pass = $('#pass').val();
            var role = $('#role').val();


            if(  pass !='' && role !='')
            {
                $.ajax({
                    url:"userinsert.php",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                alert("all Fields are Required");
            }
        });

        $(document).on('click', '.update', function(){
            var id = $(this).attr("id");
            $.ajax({
                url:"userfetch_single.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#userModal').modal('show');

                    $('#name').val(data.name);//$('#').val(data.);
                    $('#pass').val(data.password);
                    $('#id').val(id);
                    $('#action').val("Edit");
                    $('#operation').val("Edit");
                }
            })
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
                            url:"userdelete.php",
                            method:"POST",
                            data:{id:id},
                            success:function(data)
                            {
                                swal("Deleted!", "Your Record has been deleted.", "success");
                                setTimeout(function(){// wait for 5 secs(2)
                                    dataTable.ajax.reload();//to relod table
                                }, 10);
                            }
                        });

                    } else {
                        swal("Cancelled", "Your Record is safe", "error");
                    }
                });
        });





    });
</script>

