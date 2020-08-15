<?php
define('Login_Check', TRUE);
require_once '../DB/check_login.php';
?>
<?php
define('DB_Conn', TRUE);
require_once '../DB/DBConn.php';

define('Function', TRUE);
require_once '../DB/Function.php';
//Login
if (isset($_POST["Submit"])) {
    $Email = $_POST["Email"];
    $Email = check_email($Email);
    $Password = $_POST["Password"];
    $Password = check_var($Password);
    $query = "SELECT * FROM `app_user` WHERE Email = '$Email' AND Password = '$Password'";
    $result = $conn->prepare($query);
    $result->execute();
    $rowCount = $result->rowCount();
    if ($rowCount > 0) {
        $row = $result->fetch();
        if ($row["Type"] == "admin" or $row["Type"] == "user") {
            session_start();
            $_SESSION["Email"] = $row["Email"];
            $_SESSION["Name"] = $row["Name"];
            $_SESSION["Type"] = $row["Type"];
            $_SESSION["id"] = $row["id"];
            header("location:../index.php");
//            echo $_SESSION["Email"].$_SESSION["Type"].$_SESSION["id"];
        } else {
            header("location:../SignIn.php");
        }
    } else {
        header("location:../SignIn.php?msg=incorrect");
    }
}
?>
