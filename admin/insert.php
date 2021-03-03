
<?php
include('db.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $add_date =time();
        $add_date =strftime("%Y-%m-%d ",$add_date);
        $expire= $_POST["expire"];


      /*  $image = '';
        if($_FILES["user_image"]["name"] != '')
        {
            $image = upload_image();
        }*/
        $statement = $connection->prepare("
   INSERT INTO `medicine` (`id`, `barcode`, `name`, `s_price`, `p_price`, `type`, `expire`, `add_date`, `quantity`, `brand`) VALUES (NULL, :barcode, :name, :s_price, :p_price, :type, :expire, :add_date, :quantity, :brand)
  ");
        $result = $statement->execute(
            array(
                ':barcode' => $_POST["barcode"],
                ':name' => $_POST["name"],
                ':p_price' => $_POST["p_price"],
                ':s_price' => $_POST["s_price"],
                ':type' => $_POST["type"],
                ':expire' => $expire,
                ':add_date' => $add_date,
                ':quantity' => $_POST["quantity"],
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
            "UPDATE medicine 
   SET barcode = :barcode, name = :name, s_price = :s_price, p_price = :p_price, type = :type, brand = :brand, quantity= :quantity, expire = :expire  
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':barcode' => $_POST["barcode"],
                ':name' => $_POST["name"],//':' => $_POST[""],
                ':p_price' => $_POST["p_price"],
                ':s_price' => $_POST["s_price"],
                ':type' => $_POST["type"],
                ':brand' => $_POST["brand"],
                ':expire' => $_POST["expire"],
                ':quantity' => $_POST["quantity"],

                ':id'   => $_POST["id"]
            )
        );
        if(!empty($result))
        {
           echo  'Data Updated';
        }
    }
}

?>
