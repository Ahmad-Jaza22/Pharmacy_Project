
<?php
include('db.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM brand 
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {

        $output["name"] = $row["name"];//$output[""] = $row[""];

    }
    echo json_encode($output);
}
?>

