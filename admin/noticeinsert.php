
<?php
include('db.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {

        $statement = $connection->prepare("
   INSERT INTO `notice` (`id`, `heading`, `note`) VALUES (NULL, :heading, :note)
  ");
        $result = $statement->execute(
            array(

                ':heading' => $_POST["heading"],
                ':note' => $_POST["note"]


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
            "UPDATE `notice` 
   SET  heading = :heading , note = :note 
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':heading' => $_POST["heading"],//':' => $_POST[""],
                ':note' => $_POST["note"],
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
