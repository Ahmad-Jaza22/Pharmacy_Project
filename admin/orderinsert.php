
<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {



        $statement = $connection->prepare("
   INSERT INTO `order_tbl` (`id`, `name`, `type`, `brand`) VALUES (NULL, :name, :type, :brand)
  ");
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"],
                ':type' => $_POST["type"],
                ':brand' => $_POST["brand"]

            )
        );
        if(!empty($result))
        {
            echo 'Data Inserted';


        }
    }
    if($_POST["operation"] == "Edit")
    {
        /*   $image = '';
           if($_FILES["user_image"]["name"] != '')
           {
               $image = upload_image();
           }
           else
           {
               $image = $_POST["hidden_user_image"];
           }*/
        $statement = $connection->prepare(
            "UPDATE order_tbl
   SET name = :name, type = :type, brand = :brand  
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"],//':' => $_POST[""],
                ':type' => $_POST["type"],
                ':brand' => $_POST["brand"],
                ':id'   => $_POST["id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
}

?>
