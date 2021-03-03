
<?php
include('db.php');
if(isset($_POST["operation"]))
{

    if($_POST["operation"] == "Edit")
    {
        $statement = $connection->prepare(
            "UPDATE sales 
   SET  name = :name, price = :price, quantity= :quantity, subtotal = :subtotal, with_discount = :with_discount  
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(

                ':name' => $_POST["name"],//':' => $_POST[""],
                ':price' => $_POST["price"],
                ':subtotal' => $_POST["subtotal"],
                ':with_discount' => $_POST["with_discount"],
                ':quantity' => $_POST["quantity"],

                ':id'   => $_POST["id"]
            )
        );
        if(!empty($result))
        {
            echo "updated";
        }
    }
}

?>
