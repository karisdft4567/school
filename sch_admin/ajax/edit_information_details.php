<?php
include '../config/config.php'; 
include '../models/models.php';
 $id = $_POST['information_id'];
 $row = getinformationdetail($con,$id);
foreach ($row as $key => $value) {
    if ($key == 'id') 
	{  $id = $value;} 
if ($key == 'title') { $title = $value; } 
if ($key == 'description') 
{ $description = $value; }


if ($key == 'image_url') 
{ $image_url = $value; }
}
?>  
<form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Title</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="title" class="form-control col-md-7 col-xs-12" type="text" name="title" value="<?php echo $title;?>"/>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                           <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <textarea name="description" id="description"  class="form-control" rows="3" placeholder='' required="required"><?php echo $description;?></textarea>
                                                                 </div>
                                                         </div>
														 
														    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input name="update_info_image" type="file" class="file" data-preview-file-type="text" />
                                                                 <?php if($image_url!=""){?> 
																 <img style='height:100px;width:100px;' src='<?php echo $image_url;?>'/>
																 <input  name="info_image" type="hidden" class="file" data-preview-file-type="text" value="<?php echo $image_url;?>" />
																 <?php }?>
                                                            </div>
                                                        </div>  
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <input type="hidden" id="action" name="action"  value="edit_information"/>
                                                                <input type="hidden" id="id" name="id"  value="<?php echo $id;?>"/>
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>  
<script type="text/javascript">
 $(document).ready(function () {
      autosize($('.resizable_textarea'));
 });
         
</script>