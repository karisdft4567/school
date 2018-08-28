<?php
include '../config/config.php'; 
include '../models/models.php'; 
$id = $_POST['message_id']; 
$row = getmessage($con,$id);
foreach ($row as $key => $value) {
    if ($key == 'id') 
	{  
		$id = $value;
	}if ($key == 'message') 
	{
		$message = $value; 
	} 
	
}
?>  
<form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">News Title</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="message" class="form-control col-md-7 col-xs-12" type="text" name="message" value="<?php echo $message;?>"/>
                                                            </div>
                                                        </div>
                                                        
														 
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <input type="hidden"  name="action"  value="edit_message"/>
                                                                <input type="hidden"  name="id"  value="<?php echo $id;?>"/>
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