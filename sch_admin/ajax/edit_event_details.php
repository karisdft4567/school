<?php
include '../config/config.php'; include '../models/models.php'; $id = $_POST['event_id'];$staff_id=0; $row = get_eventdetail($con,$id);
foreach ($row as $key => $value) {
    if ($key == 'id') {  $id = $value;} if ($key == 'name') { $name = $value; } if ($key == 'description') { $description = $value; }  if($key == 'event_start') { $event_start = $value; } if ($key == 'event_end') { $event_end = $value; }
}
?>  
<form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Event Name</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="name" class="form-control col-md-7 col-xs-12" type="text" name="name" value="<?php echo $name;?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date & Time:</label>
                                                               <div id="datetimepicker1" class="input-append date">&nbsp;&nbsp;
                                                                  <input value="<?php echo $event_start;?>" data-format="YYYY-MM-DD hh:mm:ss" type="text" name="start_date" id="from_date" required/></input>
                                                               </div>   
                                                        </div>  
                                                        <div class="form-group">
                                                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">End Date & Time:</label>
                                                               <div id="datetimepicker2" class="input-append date">&nbsp;&nbsp;
                                                                  <input value="<?php echo $event_end;?>" data-format="YYYY-MM-DD hh:mm:ss" type="text" name="end_date" id="end_date" required/></input>
                                                               </div>   
                                                        </div>  
                                                         <div class="form-group">
                                                           <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <textarea name="description" id="description"  class="form-control" rows="3" placeholder='' required="required"><?php echo $description;?></textarea>
                                                                 </div>
                                                         </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <input type="hidden" id="action" name="action"  value="edit_event"/>
                                                                <input type="hidden" id="event_id" name="event_id"  value="<?php echo $id;?>"/>
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