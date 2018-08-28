<?php
include '../config/config.php'; include '../models/admin_access_control.php'; $session_id=$_SESSION['admin_id'];
/* MANAGE ACCESS CONTROL STARTS HERE */

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_access_control') {
    $admin_type = $_POST['admin_type'];
    $created_datetime = getCurentDatetime_DBFORMAT();
    $ModelAction = getmodelactions();
    if (count($ModelAction) > 0) {
        for ($modaction = 0; $modaction < count($ModelAction); $modaction++) {
            $modelId = $ModelAction[$modaction][0];
            $actions = $ModelAction[$modaction]['action_id'];
            $Explodeactions = explode(',', $actions);
            for ($actionexplode = 0; $actionexplode < count($Explodeactions); $actionexplode++) {
                $actionId = $Explodeactions[$actionexplode];
                isset($_POST['action_id' . $modelId . $actionId]) ? $action_status = 1 : $action_status = 0;
                //echo '<br/>Model Id='.$modelId.'&Action Id='.$actionId.'&Action Status='.$action_status;                         
                $insert_query = "INSERT INTO `admin_user_access_control` (`id`, `admin_role`, `model_id`, `action_id`, `action_status`, `created_datetime`, `modified_datetime`, `created_by`, `modified_by`, `status`) VALUES (NULL, '$admin_type', '$modelId', '$actionId', '$action_status', '$created_datetime', '$created_datetime', '$session_id', '$session_id', '1')";
                $result_query = mysql_query($insert_query);
            }
        }
    }
    $mess = 'Success';
    $tab = 1; //echo 'success';
    header('location:../views/access_control.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'edit_access_control') {
    $admin_type = $_POST['admin_type'];
    $created_datetime = getCurentDatetime_DBFORMAT();
    $ModelAction = getmodelactions();
    if (count($ModelAction) > 0) {
        mysql_query("DELETE FROM admin_user_access_control WHERE admin_role = " . $admin_type);
        for ($modaction = 0; $modaction < count($ModelAction); $modaction++) {
            $modelId = $ModelAction[$modaction][0];
            $actions = $ModelAction[$modaction]['action_id'];
            $Explodeactions = explode(',', $actions);
            for ($actionexplode = 0; $actionexplode < count($Explodeactions); $actionexplode++) {
                $actionId = $Explodeactions[$actionexplode];
                isset($_POST['action_id' . $modelId . $actionId]) ? $action_status = 1 : $action_status = 0;
                ;
//                    echo '<br/>Model Id='.$modelId.'&Action Id='.$actionId.'&Action Status='.$action_status;                         
                $insert_query = "INSERT INTO `admin_user_access_control` (`id`, `admin_role`, `model_id`, `action_id`, `action_status`, `created_datetime`, `modified_datetime`, `created_by`, `modified_by`, `status`) VALUES (NULL, '$admin_type', '$modelId', '$actionId', '$action_status', '$created_datetime', '$created_datetime', '$session_id', '$session_id', '1')";
                $result_query = mysql_query($insert_query);
            }
        }
    }
    $mess = 'Success';
    $tab = 1; //echo 'success';
    header('location:../views/access_control.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteAccessControl' && isset($_POST['id']) && $_POST['id'] != '') {
    $query = "DELETE FROM `admin_user_access_control` WHERE admin_role=" . $_POST['id'];
    if (mysql_query($query)) { } else { }
    $accesscontrolrows = get_accesscontrol();      // echo '<br/><pre>'; print_r($accesscontrolrows);
    if ($accesscontrolrows > 0) {
        for ($i = 0; $i < count($accesscontrolrows); $i++) { // echo '<br/><pre>'; print_r($accesscontrolrows[$i]);  // $explodeaccesscontrolrows=explode('-',$accesscontrolrows[$i]);{
            ?>
            <tr>
                <td><?php echo $accesscontrolrows[$i]['role_name']; ?></td>
                <td><?php echo $accesscontrolrows[$i]['model_name']; ?></td>
                <td><?php echo $accesscontrolrows[$i]['action_name']; ?></td>
                <td><a href="#" onclick="return editAccessControl(<?php echo $accesscontrolrows[$i]['admin_role']; ?>)" data-target=".bs-example-modal-lg" data-toggle="modal" title="edit"><i class="fa fa-edit"></i></a>  <a href="#" onclick="return ConfirmDelete('deleteAccesscontrol',<?php echo $accesscontrolrows[$i]['admin_role']; ?>)" data-toggle="tooltip" title="delete"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <?php
        } //}                                                                               
    } else {
        
    }
}
/* MANAGE  ACCESS CONTROL ENDS HERE */
?>