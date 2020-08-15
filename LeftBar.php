<?php
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="index.php">Admin <span>Panel</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="index.php"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li><a href="Add-Services.php"><i class="lnr lnr-plus-circle"></i> <span>DCS Register</span></a></li>
            <li><a href="issue.php"><i class="lnr lnr-picture"></i> <span>Issues Photos</span></a></li>
            <li><a href="Add-Member.php"><i class="lnr lnr-users"></i> <span>Add User</span></a></li>
            <?php if ($_SESSION["Type"] =="admin") { 
                echo "<li><a href='backup.php'><i class='lnr lnr-envelope'></i><span>&nbsp;Backup</span></a></li>"; } ?>
	    <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
            
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
