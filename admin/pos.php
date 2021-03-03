<?php
require_once('../assets/constants/config.php');
include('header.php');

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM suppliers WHERE delete_status=0");
$stmt->execute();
$result = $stmt->fetchAll();

?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-body mt-1">



            <!-- DOM - jQuery events table -->

            <section id="dom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php// require_once('../assets/constants/check-reply.php') ;?>
                                    <div class="">
                                        <table class="table table-striped table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th>barcode</th>
                                                <th>Name</th>
                                                <th>expire</th>
                                                <th>stock</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                                <th>subTotal</th>
                                                <th>add</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><input class="form-control text-sm-left" style="width: 150px" type="text" name="barcode" id="barcode" placeholder="enter the barcode "></td>
                                                    <td><input class="form-control" style="width: auto" type="text" name="pr_name" id="pr_name"></td>
                                                    <td><input class="form-control" style="width: 100px" type="text" name="pr_expire" id="pr_expire"></td>
                                                    <td><input class="form-control" style="width: 70px" type="text" name="pr_stock" id="pr_stock"></td>
                                                    <td><input class="form-control" style="width: 80px" type="text" name="pr_price" id="pr_price"></td>
                                                    <td><input class="form-control" style="width:80px" type="number" value="1" name="pr_quantity" id="pr_quantity"></td>
                                                    <td><input class="form-control" style="width: 100px" type="text" name="pr_subtotal" id="pr_subtotal"></td>

                                                    <td>
                                                        <button type="button" class="btn text-lg-center   btn-primary  add-btn" id=""><i class="la la-plus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="dom">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>
                                    <div class="">
                                        <table class="table  table-bordered table-sm">
                                            <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>expire</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                                <th>subTotal</th>
                                                <th>Remove</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Name</td>
                                                    <td>expire</td>
                                                    <td>price</td>
                                                    <td>quantity</td>
                                                    <td>subTotal</td>

                                                    <td>
                                                        <button type="button" class="btn  btn-danger  remove-btn" id=""><i class="la la-trash"></i></button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                    <?php require_once('../assets/constants/check-reply.php') ;?>
                                     <div class="form-group">
                                         <label class="label-control">Total :</label><br>
                                         <input type="text" id="total" value="10" class="form-control" placeholder="Total">
                                     </div>
                                    <div class="form-group">
                                        <label class="label-control">Discount :</label><br>
                                        <input type="number" id="discount" value="0" class="form-control" placeholder="Total">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Grand Total :</label><br>
                                        <input type="text" id="grand-total" class="form-control" placeholder="Total">
                                    </div>
                                    <button type="button" id="purchase" class="btn btn-outline-primary" style="width: 100%"><i class="la la-shopping-cart"></i> Sale</button>

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
<script>
    $(document).ready(function(){
        $('#barcode').focus();

        $('#barcode').on('keyup',function(){


            var barcode = $('#barcode').val();

            $.ajax({
                url:"posfetch.php",
                method:"POST",
                data:{barcode:barcode},
                dataType:"json",
                success:function(data)
                {

                    $('#pr_name').val(data.name);//$('#').val(data.);
                    $('#pr_price').val(data.price);
                    $('#pr_expire').val(data.expire);
                    $('#pr_stock').val(data.quantity);
                    $('#pr_quantity').focus();
                    var price = $("#pr_price").val();
                    var quantity = $('#pr_quantity').val();
                    var subtotal = price * quantity ;
                    $('#pr_subtotal').val(subtotal);


                }


            });

            $('#pr_quantity').on('keyup',function(){
                var price = $("#pr_price").val();
                var quantity = $('#pr_quantity').val();
                if(quantity < 1){
                    $('#pr_quantity').val(1);
                }
                else {

                    var subtotal = price * quantity;
                    $('#pr_subtotal').val(subtotal);
                }
            });






        });
        $('.add-btn').click(function(){

            $('#barcode').val('');
            $('#barcode').focus();
        });

        $('#discount').on('keyup',function(){
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