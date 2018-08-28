<?php
$table='admin';

function get_adminusers($con){
    $select_metatags_query = "SELECT ADMIN.id as id, ADMIN.user_name as user_name,ADMIN.email as email,ROLE.id as role_id,ROLE.name as role_name from admin as ADMIN INNER JOIN admin_type as ROLE on ADMIN.admin_type=ROLE.id";
    $select_metatags_res = mysqli_query($con,$select_metatags_query); $select_metatags_num_rows = mysqli_num_rows($select_metatags_res);
        if ($select_metatags_num_rows > 0) {
            while ($select_metatags_row = mysqli_fetch_assoc($select_metatags_res)) {
                $rowsMeta[] = $select_metatags_row;
            }
            return $rowsMeta;
        } else { return $select_metatags_num_rows; }
}

function get_adminuser($con,$id){
    $select_adminuser = mysqli_query($con,"SELECT ADMIN.*,ROLE.id as role_id,ROLE.name as role_name from admin as ADMIN INNER JOIN admin_type as ROLE on ADMIN.admin_type=ROLE.id WHERE ADMIN.id=".$id);
    while ($select_adminuser_row = mysqli_fetch_assoc($select_adminuser)) {
        return $select_adminuser_row;
    }
}
?>