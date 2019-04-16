<?php
require_once("../resources/config.php");
//$flag = 0;
session_destroy();

session_start();

$_SESSION['logged_in'] = 0;



header("location: index.php"); 




//echo $_SESSION['logged_in'];
?>