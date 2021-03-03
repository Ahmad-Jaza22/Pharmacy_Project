

<?php

include('db.php');
include('function.php');

$id=$_POST['id'];
if(isset($id)){


    global $ConnectingDB;
    $sql = "SELECT * FROM medicine WHERE id=:id";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $Result = $stmt->rowcount();
        $DataRows = $stmt->fetch();
            $ExistingName = $DataRows["name"];
            $ExistinType = $DataRows["type"];
            $ExistingBrand = $DataRows["brand"];

    $statement = $connection->prepare("
   INSERT INTO `order_tbl` (`id`, `name`, `type`, `brand`) VALUES (NULL, :name, :type, :brand)
  ");
    $result = $statement->execute(
        array(

            ':name' => $ExistingName,
            ':type' => $ExistinType,
            ':brand' => $ExistingBrand

        )
    );
    if(!empty($result))
    {
        $New_Location =  ("manage.php");
        header("Location:".$New_Location);

    }



}

?>
