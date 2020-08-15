<?php
define('Login_Check', TRUE);
require_once '../DB/check_login.php';
?>
<?php
define('DB_Conn', TRUE);
require_once '../DB/DBConn.php';

define('Function', TRUE);
require_once '../DB/Function.php';
$id = $_GET["id"];
$id = check_var($id);

$tb = $_GET["tb"];
$tb = check_var($tb);
if ( $_SESSION["Type"] == "admin"){
	$query = "DELETE FROM `$tb` WHERE id = '$id'";
        $conn->exec($query);
        header("location: $prev_page");
}
if ( $_SESSION["Type"] == "user" AND $tb == "Services")
{
	header("location: ../Services.php?No_permission");

}
if ( $_SESSION["Type"] == "user" AND $tb == "app_user")
{
	header("location: ../Members.php?No_permission");

}

?>
