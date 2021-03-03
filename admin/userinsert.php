
<?php
include('db.php');
include('function.php');
$name_exist = "hich";
$query = '';
$query .= "SELECT * FROM user_tbl WHERE name = :name   ";
$statement = $connection->prepare($query);
$result = $statement->execute(
    array(
        ':name' => $_POST["name"]
    )
);
if(!empty($result))
{
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $name_exist = $row["name"];

    }
}




if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add") {

        if($name_exist == $_POST["name"])
        {
            echo 'the name is exist try another name ';
        }

        else {

            $name = $_POST["name"];
            $statement = $connection->prepare(" CREATE TABLE " . $name . " (
  `id` INT(100) NOT NULL AUTO_INCREMENT,
  `id_stock` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `s_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
            $result = $statement->execute();


            $statement = $connection->prepare("
   INSERT INTO `user_tbl` (`id`, `name`, `password`, `role`) VALUES (NULL, :name, :password, :role)
  ");
            $result = $statement->execute(
                array(

                    ':name' => $_POST["name"],
                    ':password' => $_POST["pass"],
                    ':role' => $_POST["role"]

                )
            );
            if (!empty($result)) {
                echo 'Data Inserted';


            }
        }
        }


        if ($_POST["operation"] == "Edit") {

            $statement = $connection->prepare(
                "UPDATE user_tbl
   SET  password = :password, role = :role  
   WHERE id = :id
   "
            );
            $result = $statement->execute(
                array(

                    //':' => $_POST[""],
                    ':password' => $_POST["pass"],
                    ':role' => $_POST["role"],
                    ':id' => $_POST["id"]
                )
            );
            if (!empty($result)) {
                echo 'Data Updated';
            }
        }


}

?>
