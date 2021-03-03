
<?php
include('db.php');
include('function.php');
if(isset($_POST["barcode"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM medicine 
  WHERE barcode = '".$_POST["barcode"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["barcode"] = $row["barcode"];
        $output["name"] = $row["name"];//$output[""] = $row[""];
        $output["price"] = $row["price"];
        $output["type"] = $row["type"];
        $output["brand"] = $row["brand"];
        $output["expire"] = $row["expire"];
        $output["add_date"] = $row["add_date"];
        $output["quantity"] = $row["quantity"];

    }
    echo json_encode($output);
}
?>