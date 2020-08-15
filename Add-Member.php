<?php
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>

<?php
define('DB_Conn', TRUE);
require_once 'DB/DBConn.php';

define('Function', TRUE);
require_once 'DB/Function.php';

$id = $_GET["id"];
$id = check_var($id);

$tb = $_GET["tb"];
$tb = check_var($tb);

if (isset($id) AND ! empty($id) AND $id != "" AND isset($tb) AND ! empty($tb) AND $tb != "") {
    $query = "SELECT * FROM `$tb` WHERE id = '$id'";
    $result = $conn->prepare($query);
    $result->execute();
    $row = $result->fetch();
    $RowCount = $result->rowCount();
} else {
    $RowCount = 0;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once './Links.php'; ?>
    </head> 

    <body class="sticky-header left-side-collapsed"  onload="initMap()">
        <section>
            <!-- left side start-->
            <?php require_once './LeftBar.php'; ?>
            <!-- left side end-->

            <!-- main content start-->
            <div class="main-content">
                <!-- header-starts -->
                <?php require_once './Header.php'; ?>
                <!-- //header-ends -->
                <div id="page-wrapper">
                    <div class="graphs">
                        <?php
                        if (isset($_GET["sucess"])) {
                            ?>
                            <div class="alert-hide alert alert-success auto-hide" role="alert">
                                <strong>Well done!</strong> You successfully affect data.
                            </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (isset($_GET["No_permission"])) {
                            ?>
                            <div class="alert-hide alert alert-success auto-hide" role="alert">
                                <font color="red"><strong>No!</strong> You have no Permission.</font>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="bs-example5" data-example-id="default-media">
                            <h3 class="blank1">Add Member <a href="Members.php"><button style="float: right;" type="button" class="btn btn-warning warning_22"><i class="fa fa-arrow-left"></i> &nbsp; View Members</button></a></h3>
                            <form class="form-horizontal" method="POST" action="<?php
                            if ($RowCount > 0) {
                                echo 'php/Update-Member.php';
                            } else {
                                echo 'php/Member.php';
                            }
                            ?>" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                    <input type="text" value="<?php
                                    if ($RowCount > 0) {
                                        echo $row["Name"];
                                    }
                                    ?>" name="Name" class="form-control1" placeholder="Full Name" required="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <input type="text" value="<?php
                                    if ($RowCount > 0) {
                                        echo $row["Email"];
                                    }
                                    ?>" name="Email" class="form-control1" placeholder="Email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                </div>
				<div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input type="password" id="password" onkeyup="check();" value="<?php
                                    if ($RowCount > 0) {
                                        echo $row["Password"];
                                    }
                                    ?>" name="Password" class="form-control1" placeholder="Password" required="">
                                </div>
				<div class="form-group">
                                    <label class="control-label">Confirm Password:</label>
                                    <input type="password" id="confirm_password" onkeyup="check();" value="<?php
                                    if ($RowCount > 0) {
                                        echo $row["Password"];
                                    }
                                    ?>" name="Password" class="form-control1" placeholder="Retype Password" required=""><span id='message'></span>
                                </div>
                                <div class="form-group">
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="Status" value="user" <?php
                                            if ($RowCount > 0 AND $row["Type"] == "user") {
                                                echo "checked";
                                            }
                                            ?> checked=""> User
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="Status" value="admin" <?php
                                            if ($RowCount > 0 AND $row["Type"] == "admin") {
                                                echo "checked";
                                            }
                                            ?> > Admin
                                        </label>
                                    </div>
                                </div>

                                <?php if ($RowCount > 0) { ?>
                                    <input type="text" hidden="" name="RowId" value="<?php
                                    if ($RowCount > 0) {
                                        echo $row["id"];
                                    }
                                    ?>">
                                           <?php
                                       }
                                       ?>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="Submit" class="btn-success btn">Submit</button>
                                            <button type="reset" class="btn-inverse btn">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--body wrapper start-->
                </div>
                <!--body wrapper end-->
            </div>
            <!--footer section start-->
            <?php require_once './Footer.php'; ?>
            <!--footer section end-->

            <!-- main content end-->
        </section>

    </body>
</html>
