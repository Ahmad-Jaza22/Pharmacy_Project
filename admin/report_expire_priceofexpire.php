
<?php
include('db.php');
if(isset($_POST["start_date"]) && isset($_POST["end_date"]))
{
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"] ;


    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM sales WHERE `sale_date` > '".$start_date."' AND `sale_date` < '".$end_date."' "
    );
    $statement->execute();
    $result = $statement->fetchAll();
    $output["with_discount"] = 0 ;
    $output["profit"]  = 0;
    foreach($result as $row)
    {
        //$output[""] = $row[""];
        $output["with_discount"] =$output["with_discount"] + $row["with_discount"];
        $output["profit"] = $output["profit"] + $row["profit"];


    }
    echo json_encode($output);
}
?>

