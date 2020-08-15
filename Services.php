<?php

define('Login_Check', TRUE);
require_once '../DB/check_login.php';
?>

<?php

//die("Mar Jaa");
define('DB_Conn', TRUE);
require_once '../DB/DBConn.php';

define('Function', TRUE);
require_once '../DB/Function.php';

if (isset($_POST["Services"])) {
    $date = date("Y-m-d");
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
    $before1 = $_FILES["before"]["name"];
    chmod("/images", 0755);
    $target="images/".basename($before1);
    move_uploaded_file($_FILES['before']['tmp_name'],$target);
    $after = $_FILES["after"]["name"];
    if (!empty($date) AND $date != "" AND ! empty($department) AND $department != "" AND ! empty($arealmachine) AND $arealmachine != "" AND ! empty($issue) AND $issue != "" AND ! empty($who) AND $who != "" AND ! empty($targetdate) AND $targetdate != "") {
        try {
            $table = "Services";
            $query = "INSERT INTO `$table` SET `afterimg` = '$after' , `beforeimg` = '$before1' , `date` = '$date',dept = '$department', `arealmachine` = '$arealmachine', `issue` = '$issue',`communication` = '$communication',`who` = '$who',`targetdate` = STR_TO_DATE('$targetdate','%Y-%m-%d'),`actualdate` = STR_TO_DATE('$actualdate','%Y-%m-%d'),`wostatus` = '$wostatus', status = '$Status'";
            $result = $conn->prepare($query);
            $result->execute();
            header("location: ../Services.php?sucess");
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
?>
