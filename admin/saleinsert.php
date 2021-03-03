
<?php
include('db.php');
session_start();
$table = $_SESSION["name"];
if(isset($_POST["barcode"]))
{

    $statement = $connection->prepare(
        "SELECT * FROM medicine 
  WHERE barcode = '".$_POST["barcode"]."' OR name = '".$_POST["barcode"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result1 = $statement->fetchAll();
    foreach($result1 as $row)
    {
        $id_stock = $row["id"];
        $name = $row["name"];//$output[""] = $row[""];
        $s_price = $row["s_price"];
        $p_price = $row["p_price"];
        $quantity = 1 ;
        $subtotal = $s_price * $quantity;
        $stock = $row["quantity"];
        $expire= $row["expire"];
        $type = $row["type"];
        $brand = $row["brand"];


    }

if(!empty($result1)) {

    $statement = $connection->prepare("
   INSERT INTO ".$table." (`id`, `id_stock`, `name`, `p_price`, `s_price`, `quantity`, `subtotal`, `stock`, `expire`, `type`, `brand`) VALUES (NULL, :id_stock, :name, :p_price, :s_price, :quantity, :subtotal, :stock, :expire, :type, :brand)
  ");
    $result = $statement->execute(
        array(
            ':id_stock' => $id_stock,
            ':name' => $name,
            ':p_price' => $p_price,
            ':s_price' => $s_price,
            ':quantity' => $quantity,
            ':subtotal' => $subtotal,
            ':stock' => $stock,
            ':expire' => $expire,
            ':type' => $type,
            ':brand' => $brand

        )
    );

}

}
else if(isset($_POST["id"]))
{

    $statement = $connection->prepare(
        "DELETE FROM ".$table." WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );

}

else if(isset($_POST["delete_all"]))
{

    $statement = $connection->prepare(
        "DELETE FROM ".$table." "
    );
    $result = $statement->execute();

}





?>
