<?php
include '../config/config.php';
 include '../models/models.php';
 //print_r($_REQUEST);die;
 $id = $_REQUEST['gallery_id'];
 $staff_id=0; 
 $gallery_details = getgalleriesdetail($con,$id);
 

?>  
<form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">

                                                        <br/>
										
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <select class="form-control" id="country1" name="category" required="required">  
                                                                    <option value="">Choose option</option>
                                                                    <?php
                                                                    $select_cry = "select * from category";
																	$select_res_cry = mysqli_query($con,$select_cry);
                                                                    while ($select_row_cry = mysqli_fetch_assoc($select_res_cry)) {
																		
																		
                                                                        ?>
                                                                        <option <?php if($gallery_details['cat_id'] == $select_row_cry['id']){?>selected="selected"<?php } ?>  value="<?php echo $select_row_cry['id']; ?>"><?php echo $select_row_cry['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
														
														<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                   <input  name="title" type="text" class="form-control" value="<?php echo $gallery_details['title'];?>"  required="required"/>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input name="new_image" type="file" class="file" data-preview-file-type="text" />
                                                                 <?php if($gallery_details['img']!=""){?> 
																 <img style='height:100px;width:100px;' src='<?php echo $gallery_details['img'];?>'/>
																 <input  name="image" type="hidden" class="file" data-preview-file-type="text" value="<?php echo $gallery_details['img'];?>" />
																 <?php }?>
                                                            </div>
                                                        </div>  
                                                       
                                                           
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                               <input type="hidden"  name="id"  value="<?php echo $id;?>"/> 
															   <input type="hidden"  name="action"  value="edit_gallery"/>
															   <button type="submit" class="btn btn-success">Submit</button>
															   <button type="reset" class="btn btn-primary">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>  
<script type="text/javascript">
 $(document).ready(function () {
    $("#file").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	}); 
      autosize($('.resizable_textarea'));
        });      
</script>
<link href="../library/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" /><script src="../library/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
