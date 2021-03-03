
<?php
include('db.php');

 if(isset( $_POST["disc"])) {
     session_start();
     $table = $_SESSION["name"];

     $discount = $_POST["disc"];

     $statement = $connection->prepare(
         "SELECT * FROM ".$table."
 "
     );
     $statement->execute();
     $result1 = $statement->fetchAll();

     $i = 0;
     foreach ($result1 as $row) {
         $price = $row["price"];

         $i++;
     }

     $discount = $discount / $i ;
     echo $discount;

     foreach ($result1 as $row) {
         $id_stock = $row["id_stock"];
         $name = $row["name"];//$output[""] = $row[""];
         $p_price = $row["p_price"];
         $s_price = $row["s_price"];
         $subtotal = $row["subtotal"];
         $with_discount = $subtotal - $discount;
         $quantity = $row["quantity"];
         $expire = $row["expire"];
         $type = $row["type"];
         $brand = $row["brand"];
         $p_price_with_qty = $p_price * $quantity ;
         $profit  = $with_discount - $p_price_with_qty  ;
         $sale_date = time();
         $sale_date = strftime("%Y-%m-%d ", $sale_date);
         $sale_month = time();
         $sale_month = strftime("%Y-%m ", $sale_month);


         if (!empty($result1)) {

             $statement = $connection->prepare(
                 "UPDATE medicine 
   SET  quantity=quantity - '".$quantity."'
   WHERE id = '".$id_stock."'
   "
             );
             $statement->execute();


             $statement = $connection->prepare("
   INSERT INTO `sales` (`id`, `id_stock`, `name`, `p_price`, `s_price`, `profit`, `quantity`, `subtotal`, `with_discount`, `expire`, `type`, `brand`, `sale_date`, `sale_month`) VALUES (NULL, :id_stock, :name, :p_price, :s_price, :profit, :quantity, :subtotal, :with_discount, :expire, :type, :brand, :sale_date, :sale_month)
  ");
             $result = $statement->execute(
                 array(
                     ':id_stock' => $id_stock,
                     ':name' => $name,
                     ':p_price' => $p_price,
                     ':s_price' => $s_price,
                     ':profit' => $profit,
                     ':quantity' => $quantity,
                     ':subtotal' => $subtotal,
                     ':with_discount' => $with_discount,
                     ':sale_date' => $sale_date,
                     ':sale_month' => $sale_month,
                     ':expire' => $expire,
                     ':type' => $type,
                     ':brand' => $brand

                 )
             );

             $statement = $connection->prepare(
                 "DELETE FROM ".$table." "
             );
             $result = $statement->execute();

         }
     }

 }











?>