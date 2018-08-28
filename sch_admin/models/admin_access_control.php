<?php
$table='admin_user_access_control';

//get model actions
function getmodelactions(){ $arr='';
$select_actions = mysql_query("SELECT MODELS.id as model_id, MODELS.name as model_name, GROUP_CONCAT(ACTION.name SEPARATOR ',') as action_name ,GROUP_CONCAT(ACTION.id SEPARATOR ',') as action_id FROM admin_model_action as ACTION INNER JOIN admin_models as MODELS ON MODELS.id=ACTION.model_id group by MODELS.id ORDER BY ACTION.name ASC");
    while($rows=mysql_fetch_array($select_actions)){
       $arr[]=$rows;    
    }
    return $arr;
}    
function get_accesscontrol(){  $arr='';
 $select_actions = mysql_query("SELECT TYPE.name as role_name,ACCESSCONTROL.admin_role,ACCESSCONTROL.model_id as model_id,MODELS.name as model_name, GROUP_CONCAT(DISTINCT(ACTIONS.name) SEPARATOR ',') as action_name ,GROUP_CONCAT(DISTINCT(ACTIONS.id) SEPARATOR ',') as action_id FROM admin_type as TYPE INNER JOIN `admin_user_access_control` as ACCESSCONTROL ON TYPE.id=ACCESSCONTROL.admin_role LEFT JOIN admin_models as MODELS ON ACCESSCONTROL.model_id= MODELS.id LEFT JOIN admin_model_action as ACTIONS ON  MODELS.id=ACTIONS.model_id  WHERE ACCESSCONTROL.status=1 group by ACCESSCONTROL.admin_role");
    while($rows=mysql_fetch_array($select_actions)){
       $arr[]=$rows;    
    }
    return $arr;   
}
function editmodelactions($role_id){ $arr='';
   $select_actions = mysql_query("SELECT MODELS.id as model_id,MODELS.name as model_name,ACCESSCONTROL.action_id,MODELACTION.name as action_name,ACCESSCONTROL.action_status FROM `admin_user_access_control` as ACCESSCONTROL RIGHT JOIN admin_models as MODELS on ACCESSCONTROL.model_id=MODELS.id RIGHT JOIN admin_model_action as MODELACTION on ACCESSCONTROL.action_id=MODELACTION.id WHERE ACCESSCONTROL.admin_role=".$role_id." group by ACCESSCONTROL.action_id");
    while($rows=mysql_fetch_array($select_actions)){
       $arr[]=$rows;    
    }
    return $arr;    
}
?>