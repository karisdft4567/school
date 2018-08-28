<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>EVENT MANAGEMENT | Home Page</title>
        <?php include '../includes/js_css_links.php'; ?>
    </head>
    <body class="nav-md">
        <?php include '../config/config.php'; ?>
        <div class="container body">
            <div class="main_container">
                <!-- Menu--> 
                <?php include '../includes/left_menus.php'; ?>
                <!-- Menu-->       
                <!-- top navigation -->                
                <?php include '../includes/top_navigation.php'; include '../models/models.php';
                if(isset($arr[11])){ $accessControl=$arr[11]; }else{ $accessControl=0; } ?>
                <?php if($accessControl['View']==1){ } else{ header('location:index.php'); }
                ?>             
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <!--h3>Dashboard</h3-->
                            </div>                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="admin-home">
                                <div class="container">
                                    <img src="../images/bcs-logo-img.png", alt="BCS logo img">
                                    <h1>Welcome to Birchfield School <span>Making a lifetime imperssion.</span></h1>
                                </div>
                            </div>
                      </div>
               </div>                                      
        </div>
        </div>
        </div>
        </div>                         

        <!-- footer content -->
<?php include '../includes/footer.php'; ?>
        <!-- /footer content -->
        <!-- Parsley -->
</body>
</html>