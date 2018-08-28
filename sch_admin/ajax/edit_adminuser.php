<?php include '../config/config.php'; include '../models/model_admin_user.php';  $admin_userid = $_POST['admin_userid'];  $row = get_adminuser($con,$admin_userid); 
foreach ($row as $key => $value) {
       if($key=='id'){  $adminuserid=$value; } if($key=='admin_type'){  $admin_type=$value; }  if($key=='user_name'){  $user_name=$value; } if($key=='email'){  $email=$value; }  if($key=='password'){  $password=$value; }
}      
    ?>
<form id="demo-form-user" method="POST" enctype="multipart/form-data" action="../controllers/submit_admin_user.php" data-parsley-validate class="form-horizontal form-label-left">
    <br/>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" id="admin_type" name="admin_type" required="required">  
                <option value="">Choose option</option>
                <?php $select_admin_type = "select * from admin_type";  $select_res_admin_type = mysqli_query($con,$select_admin_type);
                while ($select_row_admin_type = mysqli_fetch_array($select_res_admin_type)) {?>
                <option value="<?php echo $select_row_admin_type['id']; ?>" <?php if($admin_type==$select_row_admin_type['id']){?> selected="selected" <?php } ?>><?php echo $select_row_admin_type['name']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>  
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="user_name" name="user_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user_name; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="email" class="form-control col-md-7 col-xs-12" type="email" name="email" data-parsley-trigger="change" value="<?php echo $email; ?>" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="password" class="form-control col-md-7 col-xs-12" type="text" name="password" required="required" value="<?php echo $password;?>"/>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <input type="hidden" id="action" name="action"  value="edit_admin_user"/>  <input type="hidden" id="user_id" name="user_id"  value="<?php echo $adminuserid; ?>" />
            <button type="submit" class="btn btn-success">Submit</button> <button type="reset" class="btn btn-primary">Cancel</button>
        </div>
    </div>
</form>
<?php  //} ?>