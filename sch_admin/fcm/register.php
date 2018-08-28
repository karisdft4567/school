<?php 

	if (isset($_REQUEST["Token"])) {
		
		   $_uv_Token=$_REQUEST["Token"];

		   $conn = mysqli_connect("localhost","cl27-sch","admin@123","cl27-sch") or die("Error connecting");

		   $q="INSERT INTO fcm_users (Token) VALUES ( '$_uv_Token') "
              ." ON DUPLICATE KEY UPDATE Token = '$_uv_Token';";
              
      mysqli_query($conn,$q) or die(mysqli_error($conn));

      mysqli_close($conn);
      
      $arr = array('status' => 'registerd');

        echo json_encode($arr);

	}


 ?>
