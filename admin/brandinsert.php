
<?php
include('db.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {

        $statement = $connection->prepare("
   INSERT INTO `brand` (`id`, `name`) VALUES (NULL, :name)
  ");
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"]


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
            "UPDATE `brand` 
   SET  name = :name 
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':name' => $_POST["name"],//':' => $_POST[""],
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
