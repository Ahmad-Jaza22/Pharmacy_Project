
<?php

include('db.php');
include("function.php");

if(isset($_POST["id"]))
{
    /*$image = get_image_name($_POST["user_id"]);
    if($image != '')
    {
        unlink("upload/" . $image);
    }*/
    $statement = $connection->prepare(
        "DELETE FROM order_tbl WHERE id = :id"
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
