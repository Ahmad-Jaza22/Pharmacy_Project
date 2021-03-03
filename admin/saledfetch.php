
<?php
include('db.php');

function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM sales");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}


$query = '';
$output = array();
$query .= "SELECT * FROM sales WHERE ";




 if(isset($_POST["search"]["value"]))
{
    $query .= ' name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR sale_date LIKE "%'.$_POST["search"]["value"].'%" ';
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
foreach($result as $row)
{

    $sub_array = array();
    $sub_array[] = $row["name"];
    $sub_array[] = $row["p_price"];
    $sub_array[] = $row["s_price"];
    $sub_array[] = $row["quantity"];
    $sub_array[] = $row["subtotal"];
    $sub_array[] = $row["with_discount"];
    $sub_array[] = $row["profit"];
    $sub_array[] = $row["expire"];
    $sub_array[] = $row["type"];
    $sub_array[] = $row["brand"];
    $sub_array[] = $row["sale_date"];
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-outline-danger btn-xs delete"><i class="la la-trash"></i></button>';

    $data[] = $sub_array;
}
$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
?>
