<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Admin User Details </title>
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
                <?php include '../includes/top_navigation.php'; ?>      
                <?php include '../models/model_admin_user.php'; if(isset($arr[1])){ $accessControl=$arr[1]; }else{ header('location:index.php'); }  ?>   
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>MANAGE ADMIN USERS</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <?php
                                    if (isset($_GET['tab']) && $_GET['tab'] == 1) {
                                        $tab = 1;
                                        $tabDetails = "active in";
                                    } else {
                                        $tab = 1;
                                        $tabDetails = "active in";
                                    }
                                    ?>
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" <?php if ($tab == 1) { ?>class="active" <?php } ?>><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Admin Users</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" <?php if ($tab == 1) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> align="" id="tab_content1" aria-labelledby="home-tab">
                                                    <div class="col-md-12 col-sm-6 col-xs-12" style="float: right;">
                                                          <?php if($accessControl['Create']==1){?>
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <?php if (isset($_GET['message']) && $_GET['message'] != "") { ?> 
                                                                    <div class="alert alert-<?php if ($_GET['message'] == 1) { ?>success<?php } else if ($_GET['message'] == 2) { ?>danger<?php } ?> alert-dismissible fade in" role="alert">
                                                                        <span class="glyphicon glyphicon-ok-sign"></span>
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i>
                                                                        </button>
                                                                        <strong>Admin user</strong> <?php if ($_GET['message'] == 1) { ?> Updated successfully!. <?php } else if ($_GET['message'] == 2) { ?> Not Inserted successfully!. <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                                <h2>Create Admin Users <small></small></h2> 

                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                          
                                                            <div class="x_content">
                                                                <form id="demo-form-user" method="POST" enctype="multipart/form-data" action="../controllers/submit_admin_user.php" data-parsley-validate class="form-horizontal form-label-left">
                                                                    <br/>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span></label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <select class="select2_single form-control" id="admin_type" name="admin_type" required="required">  
                                                                                <option value="">Choose option</option>
                                                                                <?php
                                                                                $select_admin_type = "select * from admin_type";
                                                                                $select_res_admin_type = mysqli_query($con,$select_admin_type);
                                                                                while ($select_row_admin_type = mysqli_fetch_array($select_res_admin_type)) {
                                                                                    ?>
                                                                                    <option value="<?php echo $select_row_admin_type['id']; ?>"><?php echo $select_row_admin_type['name']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User name <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <input type="text" id="user_name" name="user_name" required="required" class="form-control col-md-7 col-xs-12"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" data-parsley-trigger="change" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <input id="password" class="form-control col-md-7 col-xs-12" type="text" name="password" required="required"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                            <input type="hidden" id="action" name="action"  value="add_admin_user"/>
                                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                                            <button type="reset" class="btn btn-primary">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </form>  
                                                            </div>                                                             
                                                        </div>      
                                                          <?php } ?>         
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                          <?php if($accessControl['View']==1){?>
                                                            <div class="x_panel">
                                                                <div class="x_title">
                                                                    <h2>List Admin User<small></small></h2>  
                                                                    <ul class="nav navbar-right panel_toolbox">
                                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                        </li>
                                                                      </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                              
                                                                <div class="x_content">
                                                                    <table style="width:100%!important;" id="datatable" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>S.no</th>
                                                                                <th>Role</th>
                                                                                <th>User name</th>
                                                                                <th>Email</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="adminuser_row">
                                                                                 <?php
                                                                    $restuaranthappyhoursrows = get_adminusers($con); //echo '<pre>';  print_r($restuarantreviewsrows);
                                                                    if ($restuaranthappyhoursrows != 0) {
                                                                        for ($hapyhourrow = 0; $hapyhourrow < count($restuaranthappyhoursrows); $hapyhourrow++) {
                                                                            ?>     <tr>
                                                                                        <td><?php echo $ct=$hapyhourrow+1; ?></td>
                                                                                        <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['role_name']; ?></td>
                                                                                        <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['user_name']; ?></td>
                                                                                        <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['email']; ?></td>
                                                                                        <td>
                                                                                         <?php if($accessControl['Update']==1){?>
                                                                                        <a href="#" onclick="return editAdminuser(<?php echo $restuaranthappyhoursrows[$hapyhourrow]['id'];?>)" data-target=".bs-example-modal-lg" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a>
                                                                                         <?php } ?> 
                                                                                         <?php if($accessControl['Delete']==1){?>
                                                                                        <a href="#" onclick="return ConfirmDelete('deleteAdminuser',<?php echo $restuaranthappyhoursrows[$hapyhourrow]['id'];?>)" data-toggle="tooltip" title="delete"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                                                                         <?php } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                    }
                                                                    ?>   
                                                                      </tbody>
                                                                    </table>
                                                                </div>                                                               
                                                            </div>
                                                             <?php } ?>
                                                        </div>
                                                    </div> 
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <!--Modal Starts Here -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" >

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit</h4>
                    </div>
                    <div class="modal-body" id="edit_admin_user">
                    </div>
                </div>
            </div>
        </div>        
        <!--Modal Ends Here -->
        <!-- footer content -->
        <?php include '../includes/footer.php'; ?>
        <!-- /footer content -->
        <!-- Parsley -->
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                window.Parsley.on('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form-user .btn').on('click', function () {
                    $('#demo-form-user').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form-user').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };

            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {
            }

            function editAdminuser(id) {
                var dataobj = {admin_userid: id};
                $.ajax({
                    url: "../ajax/edit_adminuser.php",
                    type: "POST",
                    data: dataobj,
                    success: function (data) {
                        $('#edit_admin_user').html(data);
                    }, error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
            function ConfirmDelete(model_id, id) {
                var deleteId = model_id;
                if (deleteId == "deleteAdminuser") {
                    $('#confirm').modal({backdrop: 'static', keyboard: false})
                            .one('click', '#delete', function (e) {
                                DeleteAdminUser(id);
                            });
                }             
            }

            function DeleteAdminUser(id) {
                var dataobj = {
                    id: id, action: 'deleteAdminUser',
                };
                $.ajax({
                    url: "../controllers/submit_admin_user.php",
                    type: "POST",
                    data: dataobj,
                    success: function (data) {
                       // $('#adminuser_row').html(data);
                           window.location.href='admin_user.php?message=1&tab=1';  
                    }, error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
        </script>
        <!-- /Parsley --><!--SEO JS Starts Here<script src="../js/seo.js"></script> <!--SEO JS Ends Here -->
    </body>
</html>