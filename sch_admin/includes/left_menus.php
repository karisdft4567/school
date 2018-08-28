<?php ob_start(); session_start();
if(isset($_SESSION['admin_id']) && $_SESSION['admin_id']!=""){ $role=$_SESSION['admin_type'];}else{ header('location:../controllers/logout_admin.php'); }
$AccessControlQuery="SELECT GROUP_CONCAT(ACTION.name) as action_name,MODULES.id as module_id,GROUP_CONCAT(ACCESSCONTROL.action_status) as status  FROM admin_user_access_control as ACCESSCONTROL INNER JOIN admin_models as MODULES ON MODULES.id=ACCESSCONTROL.model_id INNER JOIN admin_model_action as ACTION ON ACTION.id=ACCESSCONTROL.action_id WHERE ACCESSCONTROL.admin_role=".$role." GROUP BY  ACCESSCONTROL.model_id";
$select_adminusers_res = mysqli_query($con,$AccessControlQuery);
$numrows=mysqli_num_rows($select_adminusers_res);
if ($numrows > 0) { $model_id=0; $arr=array();
while ($row = mysqli_fetch_array($select_adminusers_res)) {  $arr_models=array();
       $explode_action_name=explode(',',$row['action_name']); $module_id=$row['module_id']; $explode_action_status=explode(',',$row['status']);
       for($exp=0;$exp<count($explode_action_name);$exp++){
             $action_name= $explode_action_name[$exp];  $action_status= $explode_action_status[$exp];
             $arr_models[$action_name]=$action_status;
         }
                $arr[$module_id]=$arr_models;
     }
}
?>
<div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu prile quick info -->
                        <div class="profile clearfix">
                            <img src="../images/bcs-sidebar-logo.png" alt="img" class="img-responsive"/>
                            <!-- <div class="profile_pic">
                                <img src="../images/user.png" alt="img" class="img-circle img-responsive"/>
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo $_SESSION['admin_username'];?></h2>
                            </div> -->
                        </div>
                        <!-- /menu prile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home <span></span></a></li>
                                    <?php if($arr[1]['Create']==1 || $arr[1]['View']==1){  ?>
                                    <!--li><a href="admin_user.php"><i class="fa fa-users"></i>Admin Users<span></span></a></li-->
                                    <?php }?>
                                     <?php if($arr[10]['View']==1){  ?>
                                         <li><a href="category.php"><i class="fa fa-tags"></i>Categories<span></span></a></li>
                                         <li><a href="gallery.php"><i class="fa fa-file-image-o"></i>View Gallery<span></span></a></li>
                                         <li><a href="events.php"><i class="fa fa-user-plus"></i>Events<span></span></a></li>
                                         <li><a href="news.php"><i class="fa fa-newspaper-o"></i>Latest News<span></span></a></li>
										  <li><a href="message.php"><i class="fa fa-newspaper-o"></i>Push Notification<span></span></a></li>
                                         <li><a href="informations.php"><i class="fa fa-info-circle"></i>General Information<span></span></a></li>
                                         <li><a href="vacancies.php"><i class="fa fa-list-alt"></i>Job Vacancies<span></span></a></li>
                                         <li><a href="contact_about_us.php"><i class="fa fa-mobile"></i>About / Contact<span></span></a></li>
                                     <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
