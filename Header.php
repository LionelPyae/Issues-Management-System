<?php 
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>
<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--notification menu start -->
    <div class="menu-right">
        <div class="user-panel-top">  	

            <div class="profile_details">		
                <ul>
                    <li class="dropdown profile_details_drop">
                        
                            <div class="profile_img">	
                                <span style="background:url(images/user.png) no-repeat center"> </span> 
                                <div class="user-name">
                                    <p>Welcome<span><b><?php echo $_SESSION["Name"]; ?></b></span></p>
                                </div>
                      
                                <div class="clearfix"></div>	
                            </div>	
                        </a>
                    </li>
                    <div class="clearfix"> </div>
                </ul>
            </div>		

        </div>
    </div>
    <!--notification menu end -->
</div>
