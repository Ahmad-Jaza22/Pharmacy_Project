<?php

include('db.php');

session_start();
$table = $_SESSION["name"];
$output = array();
$statement = $connection->prepare(
    "SELECT * FROM ".$table." "
);
$statement->execute();
$result = $statement->fetchAll();
$output["total"] = 0 ;
foreach($result as $row)
{

    $output["total"] = $row["subtotal"]+$output["total"]; //$output[""] = $row[""];


}
echo json_encode($output);








?>