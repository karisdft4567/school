<?php
include '../config/config.php'; include '../models/model_admin_user.php';  $session_id=$_SESSION['admin_id'];

/* MANAGE ADMIN USER STARTS HERE */
if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_admin_user') {

    $user_name = $_POST['user_name']; $email = $_POST['email']; $admin_type = $_POST['admin_type']; $password = $_POST['password']; $created_datetime = getCurentDatetime_DBFORMAT();

    $query = "INSERT INTO `admin` (`id`,`user_name`, `email`, `password`, `admin_type`, `created_datetime`, `created_by`, `status`) VALUES (NULL,'$user_name', '$email', '$password', '$admin_type', '$created_datetime', '$session_id', '1')";
    if (mysqli_query($con,$query)) {
        $mess = '1';        $tab = 2;
        $restaurant_id = mysqli_insert_id($con);  //echo 'success'; 
        /* Elastic Search Restautant starts here */ /* Elastic Search Restautant ends here */
    } else {
        $mess = '2';
        $tab = 1; //echo 'failure' .mysql_error();
    }

    header('location:../views/admin_user.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'edit_admin_user') {
    $user_id = $_POST['user_id']; $user_name = $_POST['user_name']; $email = $_POST['email']; $admin_type = $_POST['admin_type']; $password = $_POST['password']; $created_datetime = getCurentDatetime_DBFORMAT(); $status = 1;

    $query = "UPDATE `admin` SET `user_name` = '$user_name', `email` = '$email', `password` = '$password', `admin_type` = '$admin_type', `status` = '$status',`modified_datetime`='$created_datetime','modified_by'='$session_id' WHERE `id` = " . $user_id;
    if (mysqli_query($con,$query)) {
        $mess = '1';
        $tab = 1; //echo 'success';
    } else {
        $mess = mysqli_error($con);
        $tab = 1; //echo 'failure' .mysql_error();
    }
    header('location:../views/admin_user.php?message=' . $mess . '&tab=' . $tab);
}

//delete
if (isset($_POST['action']) && $_POST['action'] == 'deleteAdminUser' && isset($_POST['id']) && $_POST['id'] != '') {
    $query = "DELETE FROM `admin` WHERE id=" . $_POST['id'];
    if (mysqli_query($con,$query)) {
        
    } else {
        
    }
    $adminusersrows = get_adminusers();
    if ($adminusersrows != 0) {
        for ($meta = 0; $meta < count($adminusersrows); $meta++) {
            $explodeadminusersrows = explode('-', $adminusersrows[$meta]); {
                ?>
                <tr>
                    <td><?php echo $explodeadminusersrows[1]; ?></td>
                    <td><?php echo $explodeadminusersrows[2]; ?></td>
                    <td><?php echo $explodeadminusersrows[3]; ?></td>
                    <td><a href="#" onclick="return editAdminuser(<?php echo $explodeadminusersrows[0]; ?>)" data-target=".bs-example-modal-lg" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a> <a href="#" onclick="return ConfirmDelete('deleteAdminuser',<?php echo $explodeadminusersrows[0]; ?>)" data-toggle="tooltip" title="delete"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                <?php
            }
        }
    } else {
        
    }
}
//delete
/* MANAGE ADMIN USER STARTS HERE */
?>