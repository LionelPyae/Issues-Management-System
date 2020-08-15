<?php

define('Login_Check', TRUE);
require_once '../DB/check_login.php';
?>

<?php

define('DB_Conn', TRUE);
require_once '../DB/DBConn.php';

define('Function', TRUE);
require_once '../DB/Function.php';

if (isset($_POST["Services"])) {
//Page Delecration for redirect
    $redirect = "location:../Services.php?";

    $date = $_POST["date"];
    $date = check_var($date);
    $department = $_POST["department"];
    $department = check_var($department);
    $arealmachine = $_POST["arealmachine"];
    $arealmachine = check_var($arealmachine);
    $issue = $_POST["issue"];
    $issus = check_var($issue);
    $communication = $_POST["communication"];
    $communication = check_var($communication);
    $who = $_POST["who"];
    $who = check_var($who);
    $targetdate = $_POST["targetdate"];
    $targetdate = check_var($targetdate);
    $actualdate = $_POST["actualdate"];
    $actualdate = check_var($actualdate);
    $wostatus = $_POST["wostatus"];
    $wostatus = check_var($wostatus);
    $Status = $_POST["Status"];


    if (isset($_POST["RowId"])) {

        $rowId = $_POST["RowId"];
        $rowId = check_var($rowId);
        if($_SESSSION["Type"] == "admin"){
                $query = "UPDATE `Services` SET `date` = STR_TO_DATE('$date','%Y-%m-%d'),dept = '$department', `arealmachine` = '$arealmachine', `issue` = '$issue',`communication` = '$communication',`who` = '$who',`targetdate` = STR_TO_DATE('$targetdate','%Y-%m-%d'),`actualdate` = STR_TO_DATE('$actualdate','%Y-%m-%d'),`wostatus` = '$wostatus', status = '$Status' WHERE id = '$rowId'";
                $result = $conn->prepare($query);
                $result->execute();
                header("location:../Services.php?" . "sucess");
            }
        else{
            $query = "UPDATE `Services` SET `actualdate` = STR_TO_DATE('$actualdate','%Y-%m-%d'),`wostatus` = '$wostatus', status = '$Status' WHERE id = '$rowId'";
                $result = $conn->prepare($query);
                $result->execute();
                header("location:../Services.php?");
        }
        }
}
?>
