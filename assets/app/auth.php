<?php
session_start();


$username = 'root';
$password = '';
$connection = new PDO('mysql:host=localhost;dbname=pharmacy1', $username, $password);


$name = $_POST['name'];
$password = $_POST['password'];
echo $password;
if($_POST['name'] !="" &&  $_POST['password'] !=""){
    echo $name ;
    echo $password;



    $stmt = $connection->prepare("SELECT * FROM user_tbl WHERE name = :name ");
    $stmt->bindParam(':name', $name);
//$stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $rec = count($result);

    if ($rec > 0) {
        foreach ($result as $row) {

            $role = $row['role'];
            $_SESSION['name'] = $name;
            $_SESSION['password']  = $password;
            $_SESSION['role'] = $role;
            if($role == 'cashier'){
                header("location:../../admin/sales.php");

            }
            else{
                header("location:../../admin/index.php");

            }
        }



    }
    else{
        header("location:../../index.php");

    }

}
else{
    header("location:../index.php");

}


?>