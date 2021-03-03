
<?php
include('db.php');
function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM user_tbl");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT * FROM user_tbl ";
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
    $sub_array[] = $row["password"];
    $sub_array[] = $row["role"];

    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-outline-primary btn-xs update"><i class="la la-edit"></i></button>';
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
