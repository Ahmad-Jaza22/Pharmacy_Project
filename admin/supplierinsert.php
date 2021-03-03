
<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {

        $statement = $connection->prepare("
   INSERT INTO `suppliers` (`id`,  `name`, `address`, `telephone`, `email`, `info`) VALUES (NULL,  :name, :address, :telephone, :email, :info)
  ");
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"],
                ':address' => $_POST["address"],
                ':telephone' => $_POST["phone"],
                ':email' => $_POST["email"],
                ':info' => $_POST["info"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Inserted';
        }
    }
    if($_POST["operation"] == "Edit")
    {

        $statement = $connection->prepare(
            "UPDATE suppliers 
   SET  name = :name, address = :address, telephone = :telephone, email = :email, info= :info 
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"],//':' => $_POST[""],
                ':address' => $_POST["address"],
                ':telephone' => $_POST["phone"],
                ':email' => $_POST["email"],
                ':info' => $_POST["info"],
                ':id' => $_POST["id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
}

?>
