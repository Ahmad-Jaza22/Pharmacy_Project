
<?php

include('db.php');

if(isset($_POST["id"]))
{

    $statement = $connection->prepare(
        "DELETE FROM type WHERE id = :id"
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
