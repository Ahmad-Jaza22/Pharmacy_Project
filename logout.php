<?php
session_start();
$_SESSION['name'] = "";
$_SESSION['role'] = "";
$_SESSION['password'] = "";
session_destroy();
header("location:./");
?>