<?php
define('Login_Check', TRUE);
require_once '../DB/check_login.php';
?>

<?php

define('DB_Conn', TRUE);
require_once '../DB/DBConn.php';

define('Function', TRUE);
require_once '../DB/Function.php';

if (isset($_POST["Submit"])) {
//Page Delecration for redirect
    $redirect = "location:../Member.php?";
$Name = $_POST["Name"];
    $Name = check_var($Name);
    $Email = $_POST["Email"];
    $Email = check_var($Email);
    $Password = $_POST["Password"];
    $Password = check_var($Password);
    $Type = $_POST["Status"];

    if (isset($_POST["RowId"])) {

        $rowId = $_POST["RowId"];
        $rowId = check_var($rowId);
        if($_SESSION["Type"] =="admin"){
                $query = "UPDATE `app_user` SET `Name` = '$Name',`Email` = '$Email',`Password` = '$Password',`Type` = '$Type' WHERE id = '$rowId' ";
                $result = $conn->prepare($query);
                $result->execute();
                header("location:../Members.php?" . "sucess");
            }
        else{
            header("location: ../Add-Member.php?No_permission");
        }
        }
        }
?>
