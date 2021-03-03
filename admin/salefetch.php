
<?php
include('db.php');
session_start();
$table = $_SESSION["name"];
$query = '';
$output = array();
$query .= "SELECT * FROM ".$table." ";

if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';

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
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . '100';
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
$total =0;
foreach($result as $row)
{

    $sub_array = array();
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-outline-danger btn-xs delete"><i class="la la-trash"></i></button>';
    $sub_array[] = $row["name"];
    $sub_array[] = $row["p_price"];
    $sub_array[] = $row["s_price"];
    $sub_array[] = '<button type="button" id="'.$row["id"].'"  class="btn btn-sm plus_btn"><i class="la la-plus"></i></button>'   .$row["quantity"].'<button type="button" id="'.$row["id"].'"  class="btn btn-default  btn-sm btn_minus"><i class="la la-minus"></i></button>';

    $subtotal = $row['subtotal'] ;
    $sub_array[] = $subtotal;
    $sub_array[] = $row["stock"];
    $sub_array[] = $row["expire"];
    $sub_array[] = $row["type"];
    $sub_array[] = $row["brand"];

    
    $data[] = $sub_array;
}

function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM admin ");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
?>
<?php



?>