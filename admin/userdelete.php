
<?php

include('db.php');
include("function.php");

if(isset($_POST["id"]))
{

    $statement = $connection->prepare(
        "SELECT * FROM user_tbl 
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $name = $row["name"];
    }
    $statement = $connection->prepare(
        "DROP TABLE ".$name." ");
    $result = $statement->execute();

    $statement = $connection->prepare(
        "DELETE FROM user_tbl WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );

    if(!empty($result))
    {
        echo 'Data Deleted';
    }
}



?>
