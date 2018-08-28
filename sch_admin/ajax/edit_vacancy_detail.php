<?php
include '../config/config.php'; include '../models/models.php'; $id = $_POST['news_id']; $row = getvacancydetail($con,$id);
foreach ($row as $key => $value) {
    if ($key == 'id') {  $id = $value;} if ($key == 'title') { $name = $value; } if ($key == 'description') { $description = $value; } if ($key == 'email_id') { $email_id = $value; } if ($key == 'contact_no') { $contact_no = $value; }
}
?>  
<form id="demo-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_details.php" data-parsley-validate class="form-horizontal form-label-left">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Job Title</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="title" class="form-control col-md-7 col-xs-12" type="text" name="title" value="<?php echo $name;?>"/>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                           <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <textarea name="description" id="description"  class="form-control" rows="3" placeholder='' required="required"><?php echo $description;?></textarea>
                                                                 </div>
                                                         </div>
                                                          <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email-id</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="email_id" class="form-control col-md-7 col-xs-12" type="email" name="email_id" value="<?php echo $email_id;?>"/>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="contact_no" class="form-control col-md-7 col-xs-12" type="text" name="contact_no" value="<?php echo $contact_no;?>"/>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <input type="hidden" id="action" name="action"  value="edit_vacancy"/>
                                                                <input type="hidden" id="news_id" name="vacancy_id"  value="<?php echo $id;?>"/>
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