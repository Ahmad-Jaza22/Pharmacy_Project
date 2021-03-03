
<?php

include('db.php');
if(isset($_POST["id"]))
{
    $statement = $connection->prepare(
        "SELECT * FROM sales WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );
$result = $statement->fetchAll();
foreach($result as $row) {
    $id_stock = $row["id_stock"];
    $quantity = $row["quantity"];
}
    $statement = $connection->prepare(
        "UPDATE medicine 
   SET  quantity=quantity + '".$quantity."'
   WHERE id = '".$id_stock."'
   "
    );
    $statement->execute();




    $statement = $connection->prepare(
        "DELETE FROM sales WHERE id = :id"
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
