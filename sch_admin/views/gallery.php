<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/><title>Gallery Details</title>
        <?php include '../includes/js_css_links.php'; ?>  
    </style>                
    </head>
    <body class="nav-md">
         <?php include '../config/config.php'; ?>
        <div class="container body">
            <div class="main_container">
                 <!-- Menu--> 
                <?php include '../includes/left_menus.php'; ?>
                <!-- Menu-->       
                <?php include '../models/models.php'; ?>   
                                                      
                <!-- top navigation -->                
                <?php include '../includes/top_navigation.php'; if(isset($arr[5])){ $accessControl=$arr[5]; }else{ $accessControl=0; } ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">

                        <div class="page-title">
                            <div class="title_left">
                                <h3>Gallery Details</h3>
                            </div>
                          </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <?php
                                    if (isset($_GET['tab']) && $_GET['tab'] == 1) {
                                        $tab = 1; $tabDetails = "active in";
                                    } else {
                                        $tab = 1; $tabDetails = "active in";
                                    }
                                    ?>
                                    <div class="x_content">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" <?php if ($tab == 1) { ?>class="active" <?php } ?>><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Gallery Details</a>
                                                </li>                                               
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" <?php if ($tab == 1) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> align="" id="tab_content1" aria-labelledby="home-tab">
                                                 <?php if($accessControl['Create']==1){?>
                                                 <div class="col-md-12 col-sm-6 col-xs-12" style="float: right;">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <?php if(isset($_GET['message']) && $_GET['message']!="" && $_GET['message']==1) {?> 
                                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i>
                                                                    </button>
                                                                    <strong>Gallery Details</strong> updated successfully!.
                                                                  </div>
                                                                <?php } ?>
																 <?php if(isset($_GET['message']) && $_GET['message']!="" && $_GET['message']== 'delete') {?> 
                                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i>
                                                                    </button>
                                                                    <strong>Gallery Details</strong> deleted successfully!.
                                                                  </div>
                                                                <?php } ?>
                                                            <h2>Add Gallery Details<small></small></h2> 
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                                    </div>
                                                            <div class="x_content">

                                                    <form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <select class="form-control" id="category_id" name="category_id" required="required">  
                                                                    <option value="">Choose option</option>
                                                                    <?php
                                                                    $select_cry = "select * from category";$select_res_cry = mysqli_query($con,$select_cry);
                                                                    while ($select_row_cry = mysqli_fetch_array($select_res_cry)) {
                                                                        ?>
                                                                        <option value="<?php echo $select_row_cry['id']; ?>"><?php echo $select_row_cry['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
														
														 <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input  name="title" type="text" class="form-control"  required="required"/>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photos <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="file" name="file[]" type="file" class="file" data-preview-file-type="text"  />
                                                            </div>
                                                        </div>  
                                                        
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <input type="hidden" id="action" name="action"  value="add_gallery"/>
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>                                
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if($accessControl['View']==1){?>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="x_panel">
                                                                <div class="x_title">
                                                                     <h2>List Gallery Details<small></small></h2>  
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
                                                                                <th>Category Name</th>
																				<th>Title</th>
                                                                                <th>Gallery</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="happyhours_row">
                                                                           <?php
                                                                    $gallery_list = getgalleries($con); 
																	
																	//echo '<pre>';  print_r($restuarantreviewsrows);
                                                                        foreach ($gallery_list as $gallery_details) {
																			
																			//print_r( $gallery_details);die;
                                                                            ?>     <tr>
                                                                                        <td><?php $gallery=getCategoryname($con,$gallery_details['cat_id']);  echo $gallery['name'];?></td>
																			      <td><?php  echo $gallery_details['title'];?></td>

                                                                                        <td>
																						<a href="#" onclick="return loadImage(<?php echo $gallery_details['id']; ?>);">
																						<img src="<?php echo $gallery_details['img']; ?>" alt="image" class="img-thumbnail" style="width:100px;height:100px;"/>
																						</a></td>
                                                                                        <td>
                                                                                         <?php if($accessControl['Update']==1){?>
                                                                                        <a href="#" onclick="return editGallerydetails(<?php echo $gallery_details['id']; ?>)" data-target=".bs-example-modal-lg" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a>
                                                                                         <?php } ?>
                                                                                          <?php if($accessControl['Delete']==1){?>
                                                                                        <a href="#" onclick="return ConfirmDelete('deleteCustomer',<?php echo $gallery_details['id'];?>)" data-toggle="tooltip" title="delete"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
                                                                                        <?php } ?>
                                                                                        </td>
                                                                                        </tr>
                                                                            <div tabindex="-1" role="dialog" aria-hidden="true" id="myModal<?php echo $gallery_details['id']; ?>" class="modal">
                                                                                <div class="modal-body" style="text-align: center!important;">
                                                                                 <a><img src="<?php echo $gallery_details['img']; ?>" class="modal-content"/></a>
                                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: black!important;font-size:16px;">x</span></button>
                                                                                  </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    
                                                                    ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--Modal Starts Here -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modaltitle" id="myModalLabel">Edit Gallery Details</h4>
                    </div>
                    <div class="modal-body" id="edit_modal_content">
                    </div>
                      </div>
            </div>
        </div>           
<!-- The Modal -->
<!-- /page content -->
<?php include '../includes/footer.php'; ?>
<script src="../js/moment.min.js"></script><script src="../js/datepicker.js"></script><link type="text/css" href="../vendors/bootstrap-timepicker-gh-pages/css/bootstrap-timepicker.min.css"/><script type="text/javascript" src="../vendors/bootstrap-timepicker-gh-pages/js/bootstrap-timepicker.js"></script>
<!-- /footer content -->
<script type="text/javascript">
function ConfirmDelete(model_id,id){ 
       var deleteId=model_id;
       if(deleteId=="deleteCustomer"){
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
         .one('click', '#delete', function (e) {
         deleteCustomer(id);
         });
        }   
}
$('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
$(document).ready(function () {
     $("#file").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	}); 
   $('#datatable').dataTable({
        "order": [[ 0, "desc" ]]
    } );
   $(":input").inputmask();    
    
 });

  function deleteCustomer(id){
	  
        var dataobj = {
            gallery_id: id, action:'deleteGallerydetails',
        };
		$('.opa').show();
        $.ajax({
            url: "../controllers/submit_details.php",
            type: "POST",
            data: dataobj,
            success: function (data) {
				
              window.location.href='gallery.php?tab=1&message=delete';   //$('#categoryrow').html(data); $(".opa").fadeOut(500);
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
   }
 
    $(document).ready(function () {
        autosize($('.resizable_textarea'));
     $('#DateDemo2').datetimepicker({
             pickTime: false
         });           
    });
     function editGallerydetails(id) {
        var dataobj = { gallery_id: id};
        $.ajax({
       	    cache: false,
            url: "../ajax/edit_gallery_details.php",
            type: "POST",
            data: dataobj,
            success: function (data) {
                $('#edit_modal_content').html(data);
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }
   function loadImage(id){
    $('#myModal'+id).modal('show');
   } 
</script>
<link href="../library/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" /><script src="../library/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
</body>
</html>