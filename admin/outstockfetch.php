
<?php
include('db.php');
function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM medicine ");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT * FROM medicine ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE barcode LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR expire LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row) {
    $sub_array = array();
    $quantity = $row["quantity"];
    if ($row["quantity"] <= 0) {

        $sub_array[] = $row["name"];

        $sub_array[] = $row["type"];
        $sub_array[] = $row["brand"];
        $sub_array[] = $row["price"];
        $current_date = date('Y-m-d');
        $expire = $row["expire"];
        $current_date = strtotime($current_date);
        $expire_date = strtotime($row["expire"]);
        $num = $expire_date - $current_date;
        $x = abs(floor($num / (60 * 60 * 24)));
        if ($current_date >= $expire_date) {

            $sub_array[] = '<button type="button"   class="btn btn btn-xs update" style="background: #ffff52;color:black">' . $x . ' days Expired</button>';
        } elseif ($x <= 60) {

            $sub_array[] = '<button type="button"   class="btn btn-danger btn-xs update">' . $x . ' Days For Expire</button>';
        } else {

            $sub_array[] = $row["expire"];
        }
        $sub_array[] = $row["add_date"];



        if ($quantity <= 0) {

            $sub_array[] = '<button type="button"  class="btn btn-info btn-xs update"> Out of Stock</button>';

        } else {
            $sub_array[] = $row["quantity"];

        }
        $sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-outline-primary btn-xs update"><i class="la la-edit"></i></button>';
        $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-outline-danger btn-xs delete"><i class="la la-trash"></i></button>';
        /*  $url="addorder.php?id=" . $row["id"];
          $sub_array[] = '<a type="button" href="'.$url.'" class="btn btn-outline-success btn-xs ">Order</button>';
         */
        $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-outline-success btn-xs order">Order</button>';

        $data[] = $sub_array;
    }
}
$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
     "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
?>
