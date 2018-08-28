<?php ob_start(); session_start();
include '../config/config.php'; include '../models/model_admin_user.php';  //include '../includes/elastic_functions.php'; 

/* MANAGE ADMIN USER STARTS HERE */
if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'login') {
    $email = $_POST['email'];  $password = $_POST['password'];
    $select_adminusers = "select ADMIN.* from admin as ADMIN where email='$email' and password = '$password' and status=1"; $select_adminusers_res = mysqli_query($con,$select_adminusers); $numrows=mysqli_num_rows($select_adminusers_res); 
        if ($numrows > 0) {
            while ($row = mysqli_fetch_array($select_adminusers_res)) {  $user_id=$row['id']; $user_name=$row['user_name']; $email=$row['email']; $admin_type=$row['admin_type']; $_SESSION['admin_id'] =$user_id; $_SESSION['admin_username'] =$user_name; $_SESSION['admin_type'] =$admin_type;
            }
                header('location:../views/index.php');
        }else{  header('location:../index.php?mess=1'); }
}
?>