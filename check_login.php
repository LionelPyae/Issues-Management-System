<?php
ob_start();
session_start();
//$path = header("location:../SignIn.php?msg=Incorrect");
defined('Login_Check') or die("Dwtf");

define('DB_Conn', TRUE);
require_once 'DBConn.php';

define('Function', TRUE);
require_once 'Function.php';

if (isset($_SESSION["Email"]) OR ( $_SESSION["Type"] == "admin") AND isset($_SESSION["id"]) OR ( $_SESSION["Type"] == "user")) {
    $Email = $_SESSION["Email"];
    $Email = check_email($Email);
    $Type = check_var($_SESSION["Type"]);
    if (check_empty($Email) != FALSE AND check_empty($Type) != FALSE) {
        $query = "SELECT * FROM `app_user` WHERE Email = '$Email' AND Type = '$Type'";
        $result = $conn->prepare($query);
        $result->execute();
        $RowCount = $result->rowCount();
        if ($RowCount < 1) {
            $path = "../SingIn.php?ms=incorrect";
            redirect($path);
        }
    }
} else {
    header("location:SignIn.php");
}
?>
