
<?php
include('db.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM sales
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["id"] = $row["id"];
        $output["name"] = $row["name"];//$output[""] = $row[""];
        $output["price"] = $row["price"];
        $output["quantity"] = $row["quantity"];
        $output["subtotal"] = $row["subtotal"];
        $output["with_discount"] = $row["with_discount"];
        $output["expire"] = $row["expire"];
        $output["type"] = $row["type"];
        $output["brand"] = $row["brand"];
        $output["sale_date"] = $row["sale_date"];

    }
    echo json_encode($output);
}
?>

