<?php
defined('DB_Conn') or die("NOT With me my friend");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dcs_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed!!" . $e->getMessage();
}

function err_hand($eno, $msg) {
    
}

set_error_handler("err_hand", E_NOTICE);

date_default_timezone_set("asia/yangon");
?>
