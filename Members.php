<?php
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>
<?php
define('DB_Conn', TRUE);
require_once 'DB/DBConn.php';

define('Function', TRUE);
require_once 'DB/Function.php';

$query = "SELECT * FROM `app_user`";
$result = $conn->prepare($query);
$result->execute();
$row = $result->fetchAll();
$RowCount = $result->rowCount();
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
                                <font color="red"><strong>No!</strong> You have no permission to detete.</font>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="bs-example5" data-example-id="default-media">
                            <h3 class="blank1">Members <a href="Add-Member.php"><button style="float: right;" type="button" class="btn btn-warning warning_22"><i class="fa fa-plus"></i> &nbsp; Add Member </button></a></h3>
                            <div class="table-responsive">
                                <div style="float:right;">
                                <!-- <label>Search By ID</label>
                                <input type="text" value="" name="search" placeholder="Search...">--></div> 
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 0;
                                        foreach ($row as $rows) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $rows['id']; ?></th>
                                                <td><?php echo $rows["Name"]; ?></td>
                                                <td><?php echo $rows["Email"]; ?></td>
                                                <td><?php if ($_SESSION["Type"]== "admin") {echo $rows["Password"];}else{echo "*****";} ?></td>
						<td><?php echo $rows["Type"]; ?></td>
                                                <td>
                                                    <a href="Add-Member.php?id=<?php echo $rows['id']; ?>&tb=app_user"><i style="color: green; font-size: 1.5em;" class="fa fa-pencil-square-o"></i></a> &nbsp;&nbsp;
                                                    <a href="php/delete.php?id=<?php echo $rows['id']; ?>&tb=app_user" onclick="return confirm('Are you sure you want to delete??');"><i style="color: red;font-size: 1.5em;" class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
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
