<?php
include('header.php');
include('db.php');
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Out Of Stock</h3>

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

                                    <div class="table-responsive">
                                        <table id="user_data" class="table table-bordered table-striped ">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>expireDate</th>
                                                <th>AddDate</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th >Delet</th>
                                                <th>Order</th>

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

                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="barcode" />
                    <br />
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" />
                    <br />
                    <input type="number" name="price" id="price" class="form-control" placeholder="price" />
                    <br />
                    <div class="form-group">
                        <label>Enter Type :</label>
                        <select name="type" id="type" class="form-control">
                            <?php
                            global $ConnectingDB;
                            $sql = "SELECT * FROM medicine_category ORDER BY id desc";
                            $stmt = $connection->query($sql);
                            while ($DataRows = $stmt->fetch()) {
                                $type = $DataRows["name"];
                                ?>
                                <option value="<?php echo $type;?>"><?php echo $type;?></option>
                            <?php }?>



                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enter Brand :</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enter Expire Date :</label>
                        <input type="date" name="expire" id="expire" class="form-control" placeholder="expire" />
                    </div>
                    <br>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="quantity" />
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
                url:"outstockfetch.php",
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
            var barcode = $('#barcode').val();
            var name = $('#name').val();
            var price = $('#price').val();
            var type = $('#type').val();
            var brand = $('#brand').val();
            var expire = $('#expire').val();
            var quantity = $('#quantity').val();
            // var extension = $('#user_image').val().split('.').pop().toLowerCase();
            /*  if(extension != '')
              {
                  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                  {
                      alert("Invalid Image File");
                      $('#user_image').val('');
                      return false;
                  }
              }*/
            if(barcode != '' && name != '' && price != '' && type !='' && brand !='' && expire !='' && quantity !='')
            {
                $.ajax({
                    url:"insert.php",
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
                url:"fetch_single.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#userModal').modal('show');
                    $('#barcode').val(data.barcode);
                    $('#name').val(data.name);//$('#').val(data.);
                    $('#price').val(data.price);
                    $('#expire').val(data.expire);
                    $('#quantity').val(data.quantity);
                    // $('#').val(data.);
                    //$('.modal-title').text("Edit User");
                    $('#id').val(id);
                    // $('#user_uploaded_image').html(data.user_image);
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
                            url:"delete.php",
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
        $(document).on('click', '.order', function(){

            var id = $(this).attr("id");
            $.ajax({
                url:"addorder.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    swal("Ordered!", "Your Record has been Orderd.", "success");
                    setTimeout(function(){// wait for 5 secs(2)
                        dataTable.ajax.reload();//to relod table
                    }, 10);
                }
            });


        });


    });
</script>

