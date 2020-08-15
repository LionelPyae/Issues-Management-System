<?php
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>
<?php
define('DB_Conn', TRUE);
require_once 'DB/DBConn.php';

define('Function', TRUE);
require_once 'DB/Function.php';
$page=$_GET["page"];
if($page=="" || $page=="1"){
    $page1=0;
}
else{
    $page1=($page*7)-7;
}
$query = "SELECT * FROM `Services` limit $page1,7";
$result = $conn->prepare($query);
$result->execute();
$row = $result->fetchAll();
$query2= "SELECT * FROM Services";
$result2 = $conn->prepare($query2);
$result2->execute();
$RowCount = $result2->rowCount();
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
                            <h3 class="blank1">Issue Photo <a href="Add-Services.php"><button style="float: right;" type="button" class="btn btn-warning warning_22"><i class="fa fa-plus"></i> &nbsp; Add </button></a></h3>
                            
                            <div class="table-responsive">
                               <center> <?php $a=$RowCount/7; 
                                $a=ceil($a);
                                for($b=1;$b<=$a;$b++){
                                ?><a href="issue.php?page=<?php echo $b ?>">Page-<?php echo $b." ";?></a><?php } ?></center>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Action Number</th>
                                            <th>Issue</th>
                                            <th>Before Photo</th>
                                            <th>After Photo</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 0;
                                        foreach ($row as $rows) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $rows['id']; ?></th>
						<td><?php echo $rows["issue"]; ?></td>
                        <td><img src="php/images/<?php echo $rows["beforeimg"]; ?>" style="height: 5em; width: 5em;"></td>
                        <td><img src="php/images/<?php echo $rows["afterimg"]; ?>" style="height: 5em; width: 5em;"></td>
                          <td><?php echo $rows["status"]; ?></td>                      
                                                <td>
							
                                                    <a href="Add-Services.php?id=<?php echo $rows['id']; ?>&tb=Services"><i style="color: green; font-size: 1.5em;" class="fa fa-pencil-square-o"></i></a> &nbsp;&nbsp;
                                                    <a href="php/delete.php?id=<?php echo $rows['id']; ?>&tb=Services" onclick="return confirm('Are you sure you want to delete??');"><i style="color: red;font-size: 1.5em;" class="fa fa-trash-o"></i></a>
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
