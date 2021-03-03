
<?php
include('db.php');
if(isset($_POST["start_date"]) && isset($_POST["end_date"]))
{
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"] ;


    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM medicine WHERE `add_date` > '".$start_date."' AND `add_date` < '".$end_date."' "
    );
    $statement->execute();
    $result = $statement->fetchAll();
    $output["purchase"]  = 0;
    foreach($result as $row)
    {
        //$output[""] = $row[""];
        $output["purchase"] = $output["purchase"] + $row["p_price"];


    }
    echo json_encode($output);
}
?>

