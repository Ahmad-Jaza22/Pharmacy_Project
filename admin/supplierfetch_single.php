
<?php
include('db.php');
include('function.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM suppliers 
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {

        $output["name"] = $row["name"];//$output[""] = $row[""];
        $output["address"] = $row["address"];
        $output["phone"] = $row["telephone"];
        $output["email"] = $row["email"];
        $output["info"] = $row["info"];

    }
    echo json_encode($output);
}
?>

