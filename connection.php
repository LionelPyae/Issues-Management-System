<?php
  $host="127.0.0.1";
  $uname="root";
  $pass="";
  $database = "dcs_db"; 
$connection=mysqli_connect($host,$uname,$pass); 
$selectdb=mysqli_select_db($connection,$database);
$result=mysqli_select_db($connection,$database);
?>