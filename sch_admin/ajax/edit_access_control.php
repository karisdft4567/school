<?php
include '../config/config.php'; include '../models/admin_access_control.php'; 
$role_id = $_POST['role_id'];
?>
<form id="accesscontrol-form" method="POST" enctype="multipart/form-data" action="../controllers/submit_access_control.php" data-parsley-validate class="form-horizontal form-label-left">
    <br/>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" id="admin_type" name="admin_type" required="required">  
                <option value="">Choose option</option>
                <?php
                $select_admin_type = "select * from admin_type";   $select_res_admin_type = mysql_query($select_admin_type);
                while ($select_row_admin_type = mysql_fetch_array($select_res_admin_type)) {
                    ?>
                    <option value="<?php echo $select_row_admin_type['id']; ?>" <?php if($role_id==$select_row_admin_type['id']){ echo 'selected=selected';}?>><?php echo $select_row_admin_type['name']; ?></option>
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
            <?php  $modelname=''; $model_actions=''; $model_actionsStatus=''; $ct=0;
            $ModelAction = editmodelactions($role_id);//echo '<pre>';  print_r($ModelAction); 
            if (count($ModelAction) > 0) {
                for ($modaction = 0; $modaction < count($ModelAction); $modaction++) { $ct=$ct+1;
                   if($modelname!=$ModelAction[$modaction]['model_name']){ 
                      $modelids[]= $ModelAction[$modaction]['model_id'];
                       $model_actions[$ModelAction[$modaction]['model_name']][]=$ModelAction[$modaction]['model_id'].'-'.$ModelAction[$modaction]['action_id'].'-'.$ModelAction[$modaction]['action_name'].'-'.$ModelAction[$modaction]['action_status'];
                    }else{
                       $ModelAction[$modaction]['model_name'];
                       $model_actions[$ModelAction[$modaction]['model_name']][]=$ModelAction[$modaction]['model_id'].'-'.$ModelAction[$modaction]['action_id'].'-'.$ModelAction[$modaction]['action_name'].'-'.$ModelAction[$modaction]['action_status'];
                    }
                  $modelname=  $ModelAction[$modaction]['model_name'];
                  } } else {
        } //echo '<pre>'; print_r($model_actions);
        foreach ($model_actions as $k => $v) {  $actions=$model_actions[$k]; 
           ?>
        <tbody id="accesscontrolrow">
                    <tr>
                        <td><?php $keymodels=explode('-',$k); 
                        for($mode=0;$mode<count($keymodels);$mode++){
                            echo $keymodels[$mode];
                        }
                        ?></td>
                        <td><?php for($act=0;$act<count($actions);$act++){ $actexplode=explode('-',$actions[$act]);  ?>
                            &nbsp;&nbsp;<label> <input type="checkbox" id="modelaction" name="action_id<?php echo $actexplode[0].$actexplode[1]; ?>" class="flat" <?php if($actexplode[3]==1){?>checked="checked"<?php } ?>> <?php echo ucwords($actexplode[2]); ?></label>&nbsp;
                            <?php  }?></td>
                    </tr>
            </tbody>       
          <?php
        }
        ?>
        </tbody>                                                                     
    </table>
    <ul class="parsley-errors-list filled" id="parsley-id-6" style="display:none; float: none;margin-left: 260px;"><li class="parsley-required">This value is required.</li></ul>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <input type="hidden" id="role_id" name="role_id" value="<?php echo $role_id;?>"/> <input type="hidden" id="action" name="action"  value="edit_access_control"/><button type="submit" class="btn btn-success">Submit</button><button type="reset" class="btn btn-primary">Cancel</button>
        </div>
    </div>
</form>