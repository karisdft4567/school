<?php
include '../config/config.php'; 
if($_POST['action']=='country'){ $country_id = $_POST['country_id'];
$select_state = "select * from location where parent_id=$country_id and location_type=1"; $select_res_state = mysqli_query($con,$select_state);
while ($select_row_state = mysqli_fetch_array($select_res_state)) {
    ?>
    <option value="<?php echo $select_row_state['location_id']; ?>"><?php echo $select_row_state['name']; ?></option>
<?php } 
}else if($_POST['action']=='state'){ $state_id = $_POST['state_id'];
$select_state = "select * from location where parent_id=$state_id and location_type=2"; $select_res_state = mysqli_query($con,$select_state);
while ($select_row_state = mysqli_fetch_array($select_res_state)) {
    ?>
    <option value="<?php echo $select_row_state['location_id']; ?>"><?php echo $select_row_state['name']; ?></option>
<?php } 
}else
?>