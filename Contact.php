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
    $Address = $_POST["Address"];
    $Address = check_var($Address) or die("Address Not Valid");
    if ($_POST["Mobile"] != "") {
        $Mobile = $_POST["Mobile"];
    }
    $Telephone = check_int($_POST["Telephone"]) or die("Telephone Not valid");
    $Email = check_email($_POST["Email"]) or die("Email Not valid");
    $Facebook = check_url($_POST["Facebook"]) or die("Facebook Not valid");
    $Twitter = check_url($_POST["Twitter"]) or die("Twitter Not valid");
    $Linkedin = check_url($_POST["Linkedin"]) or die("Linkedin Not valid");
//    $Description = form_valid($Description);

    if (!empty($Address) AND $Address != "") {
        try {
            $query = "UPDATE `Contact` SET `Address` = '$Address',`Mobile` = '$Mobile',`Telephone` = '$Telephone',`Email` = '$Email',`Facebook` = '$Facebook',`Twitter` = '$Twitter',`Linkedin` = '$Linkedin', IP_Address = '$ip_address', DateTime = '$DateTime' WHERE id = '1'";
            $result = $conn->prepare($query);
            $result->execute();
            if ($result->rowCount() < 1) {
                $query = "INSERT INTO `Contact` SET `Address` = '$Address',`Mobile` = '$Mobile',`Telephone` = '$Telephone',`Email` = '$Email',`Facebook` = '$Facebook',`Twitter` = '$Twitter',`Linkedin` = '$Linkedin', IP_Address = '$ip_address', DateTime = '$DateTime'";
                $result = $conn->prepare($query);
                $result->execute();
            }
            header("location: ../Contact.php?sucess");
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
?>