<?php
include('db.php');

if (isset($_POST["id"])) {
    session_start();
    $table = $_SESSION["name"];
    $statement = $connection->prepare(
        "UPDATE ".$table."
    SET quantity= quantity-1
   WHERE id = '" . $_POST["id"] . "'
   "
    );

    $result = $statement->execute();


    $statement = $connection->prepare(
        "SELECT * FROM ".$table." 
  WHERE id = '" . $_POST["id"] . "'
  "
    );
    $statement->execute();
    $result1 = $statement->fetchAll();
    foreach ($result1 as $row) {
        $quantity = $row["quantity"];
        $price = $row["s_price"];
        $subtotal = $quantity * $price;
        $statement = $connection->prepare(
            "UPDATE ".$table." 
      SET subtotal= '" . $subtotal . "' 
   WHERE id = '" . $_POST["id"] . "'
   "
        );

        $result = $statement->execute();

        if ($quantity < 1) {
            $statement = $connection->prepare(
                "UPDATE ".$table." 
    SET quantity= 1 
   WHERE id = '" . $_POST["id"] . "'
   "
            );

            $result = $statement->execute();


        }


    }

}
?>