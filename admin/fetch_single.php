
<?php
include('db.php');
if(isset($_POST["id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM medicine 
  WHERE id = '".$_POST["id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["barcode"] = $row["barcode"];
        $output["name"] = $row["name"];//$output[""] = $row[""];
        $output["p_price"] = $row["p_price"];
        $output["s_price"] = $row["s_price"];
        $output["type"] = $row["type"];
        $output["brand"] = $row["brand"];
        $output["expire"] = $row["expire"];
        $output["add_date"] = $row["add_date"];
        $output["quantity"] = $row["quantity"];
       /* if($row["image"] != '')
        {
            $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
        }
        else
        {
            $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
        }*/
    }
    echo json_encode($output);
}
?>

