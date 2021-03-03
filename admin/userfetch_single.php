
<?php
include('db.php');
include('function.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM user_tbl 
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["name"] = $row["name"];//$output[""] = $row[""];
        $output["password"] = $row["password"];
        $output["role"] = $row["role"];


    }
    echo json_encode($output);
}
?>

