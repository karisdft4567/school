<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Access Control </title>
        <?php include '../includes/js_css_links.php'; ?>        
        <style type="text/css"> .glyphicon-ok-sign::before{ color: white; }</style>
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
                <!-- /top navigation -->
                <?php 
                include '../models/admin_access_control.php'; 
                if(isset($arr[2])){ $accessControl=$arr[2]; }else{ header('location:index.php'); }  
                ?>    
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Admin Accress Control</h3>
                            </div>
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                                </div>
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
                                    }else {
                                        $tab = 1;
                                        $tabDetails = "active in";
                                    }
                                    ?>
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" <?php if ($tab == 1) { ?>class="active" <?php } ?>><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Access Control</a>
                                                </li>                                               
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" <?php if ($tab == 1) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> align="" id="tab_content1" aria-labelledby="home-tab">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <?php if (isset($_GET['message']) && $_GET['message'] != "" && $_GET['message'] == 1) { ?> 
                                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i>
                                                                    </button>
                                                                    <strong>Category's</strong> updated successfully!.
                                                                </div>
                                                            <?php } ?>
                                                            <h2>Add Access Control<small></small></h2>  
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                </li>
                                                                <li class="dropdown">
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                       <?php if($accessControl['Create']==1){?>
                                                        <div class="x_content">
                                                            <form id="accesscontrol-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_access_control.php" data-parsley-validate class="form-horizontal form-label-left">
                                                                <br/>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select class="form-control" id="admin_type" name="admin_type" required="required">  
                                                                            <option value="">Choose option</option>
                                                                            <?php
                                                                            $select_admin_type = "select * from admin_type";
                                                                            $select_res_admin_type = mysql_query($select_admin_type);
                                                                            while ($select_row_admin_type = mysql_fetch_array($select_res_admin_type)) {
                                                                                ?>
                                                                                <option value="<?php echo $select_row_admin_type['id']; ?>"><?php echo $select_row_admin_type['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>   
                                                                <table style="width:100%!important;" id="datatable1" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Module Name</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>                                                                        
                                                                    <tbody>
                                                                        <?php
                                                                        $ModelAction = getmodelactions(); //echo '<pre>';  print_r($ModelAction);
                                                                        if (count($ModelAction) > 0) {
                                                                            for ($modaction = 0; $modaction < count($ModelAction); $modaction++) {
                                                                                ?>
                                                                            <tbody id="accesscontrolrow">
                                                                                <tr>
                                                                                    <td><?php echo $ModelAction[$modaction][1]; ?></td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $actions = $ModelAction[$modaction][2]; //echo '<br/>Model id='.$ModelAction[$modaction]['model_id'];
                                                                                        $actions1 = $ModelAction[$modaction]['action_id'];
                                                                                        $Explodeactions = explode(',', $actions);
                                                                                        $Explodeactions1 = explode(',', $actions1);
                                                                                        for ($actionexplode = 0; $actionexplode < count($Explodeactions1); $actionexplode++) { //echo '<br/>'.$Explodeactions1[$actionexplode];
                                                                                            ?>
                                                                                        &nbsp;&nbsp;<label> <input type="checkbox" id="modelaction" name="action_id<?php echo $ModelAction[$modaction]['model_id'] . $Explodeactions1[$actionexplode]; ?>" class="flat" checked="checked" value="<?php echo $Explodeactions1[$actionexplode];?>"> <?php echo ucwords($Explodeactions[$actionexplode]); ?></label>&nbsp;
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>  
                                                                    <?php } else {
                                                                        
                                                                    }
                                                                    ?>
                                                                    </tbody>                                                                     
                                                                </table>
                                                                <ul class="parsley-errors-list filled" id="parsley-id-6" style="display:none; float: none;margin-left: 260px;"><li class="parsley-required">This value is required.</li></ul>
                                                                <div class="ln_solid"></div>
                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                        <input type="hidden" id="action" name="action"  value="add_access_control"/><button type="submit" class="btn btn-success">Submit</button><button type="reset" class="btn btn-primary">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>     
                                                        </div>
                                                        <?php } ?>   
                                                    </div>  
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>List Access Control <small></small></h2>  
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <?php if($accessControl['View']==1){?>
                                                        <div class="x_content">
                                                            <table style="width:100%!important;" id="datatable" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Role</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="accesscontrol_row">
                                                                    <?php
                                                                    $accesscontrolrows = get_accesscontrol();      // echo '<br/><pre>'; print_r($accesscontrolrows);
                                                                    if ($accesscontrolrows > 0) {
                                                                        for ($i = 0; $i < count($accesscontrolrows); $i++) { // echo '<br/><pre>'; print_r($accesscontrolrows[$i]);  // $explodeaccesscontrolrows=explode('-',$accesscontrolrows[$i]);{
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $accesscontrolrows[$i]['role_name']; ?></td>
                                                                                <td>
                                                                                <?php if($accessControl['Update']==1){?>
                                                                                <a href="#" onclick="return editAccessControl(<?php echo $accesscontrolrows[$i]['admin_role']; ?>)" data-target=".bs-example-modal-lg" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a>  
                                                                                <?php } 
                                                                                      if($accessControl['Delete']==1){?>
                                                                                <a href="#" onclick="return ConfirmDelete('deleteAccessControl',<?php echo $accesscontrolrows[$i]['admin_role']; ?>)" data-toggle="tooltip" title="delete"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                                                                <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } //}                                                                               
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
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
                    <div class="modal-body" id="edit_modal_content">
                    </div>
                </div>
            </div>
        </div>

        <!--Modal Ends Here -->

        <!-- footer content -->
<?php include '../includes/footer.php'; ?>
        <!-- /footer content -->

        </script>
        <!-- Autosize -->
        <script type="text/javascript">
            $('#accesscontrol-form').on('submit', function (e) {
                if ($("input[type=checkbox]:checked").length === 0) {
                    e.preventDefault();
                    $('#parsley-id-6').show();// alert('no way you submit it without checking a box');
                    return false;
                } else {
                    $('#parsley-id-6').hide();
                }
            });
            function editAccessControl(id) {
                var dataobj = {role_id: id};
                $.ajax({
                    url: "../ajax/edit_access_control.php",
                    type: "POST",
                    data: dataobj,
                    success: function (data) {
                        $('#edit_modal_content').html(data);
                        $('input.flat').iCheck({
                            checkboxClass: 'icheckbox_flat-green',
                            radioClass: 'iradio_flat-green'
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
            function deleteAccessControl(id) {
                var dataobj = {
                    id: id, action: 'deleteAccessControl',
                };
                $.ajax({
                    url: "../controllers/submit_access_control.php",
                    type: "POST",
                    data: dataobj,
                    success: function (data) {
                        $('#accesscontrol_row').html(data);
                    }, error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
            function ConfirmDelete(model_id, id) {
                var deleteId = model_id;
                if (deleteId == "deleteAccessControl") {
                    $('#confirm').modal({backdrop: 'static', keyboard: false})
                            .one('click', '#delete', function (e) {
                                deleteAccessControl(id);
                            });
                }                
            }
        </script>
        <!-- /Autosize -->

        <!-- /Datatables -->
        <!-- /Starrr -->
    </body>
</html>