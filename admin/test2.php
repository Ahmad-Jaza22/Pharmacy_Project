
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "pharmacy1");

$query = "SELECT * FROM sales WHERE ";

if($_POST["is_date_search"] == "yes")
{
    $query .= 'sale_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
    $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR name LIKE "%'.$_POST["search"]["value"].'%" 
  OR type LIKE "%'.$_POST["search"]["value"].'%" 
  OR brand LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
    $sub_array = array();
    $sub_array[] = $row["name"];
    $sub_array[] = $row["price"];
    $sub_array[] = $row["quantity"];
    $sub_array[] = $row["subtotal"];
    $sub_array[] = $row["with_discount"];
    $sub_array[] = $row["expire"];
    $sub_array[] = $row["type"];
    $sub_array[] = $row["brand"];
    $sub_array[] = $row["sale_date"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-primary btn-xs update"><i class="la la-edit"></i></button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-outline-danger btn-xs delete"><i class="la la-trash"></i></button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM sales";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);

?>
