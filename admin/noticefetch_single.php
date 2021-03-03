
<?php
include('db.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM notice
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {

        $output["heading"] = $row["heading"];//$output[""] = $row[""];
        $output["note"] = $row["note"];

    }
    echo json_encode($output);
}
?>

