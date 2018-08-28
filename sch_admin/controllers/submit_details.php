<?php
include '../config/config.php'; 
include '../models/models.php';   
session_start(); 
$session_id=$_SESSION['admin_id'];

$base_path="http://schoolsapp.co.uk/sch_admin/";

/* PUSH NOTIFICATIONS */

function send_notification ($tokens, $message,$action)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message,
                         'action' => 'alert',
			);

		$headers = array(
			'Authorization:key = AIzaSyDIeMqiadZQUCHe6FfLaWSI8NS2digClLI',
			'Content-Type: application/json'
			);

       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}
	
/* MANAGE Details STARTS HERE */
if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_event') { $created_datetime = getCurentDatetime_DBFORMAT();    
    $name = $_POST['name']; $start_date = $_POST['start_date']; $end_date = $_POST['end_date']; $description=$_POST['description'];
    $query = "INSERT INTO `events` (`id`, `name`, `description`, `event_start`, `event_end`, `created_datetime`,  `modified_datetime`, `status`) VALUES 
                                        (NULL, '$name', '$description', '$start_date', '$end_date', '$created_datetime', '',  '1')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/events.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'edit_event') { $created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_POST['event_id']; $name = $_POST['name']; $start_date = $_POST['start_date']; $end_date = $_POST['end_date']; $description=$_POST['description'];
    $query = "UPDATE `events` SET  `name`='$name', `event_start` = '$start_date', `event_end` = '$end_date', `description`='$description',`modified_datetime` = '$created_datetime' WHERE `id` = $id";
    if (mysqli_query($con,$query)) {     $mess = '1';  $tab = 1; } else { $mess = mysqli_error();$tab = 1; }
    header('location:../views/news.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteEventdetails' && isset($_POST['event_id']) && $_POST['event_id'] != '') {
    $query = "DELETE FROM `events` WHERE id=" . $_POST['event_id'];
    if (mysqli_query($con,$query)){  } else { }
}

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_news') { $created_datetime = getCurentDatetime_DBFORMAT();    
    $name = $_POST['title'];
	$description=$_POST['description'];

	$file_name=$_FILES["news_image"]["name"];
					$uploadfile = '../uploads/news/' . $file_name;  
					if(move_uploaded_file($_FILES["news_image"]["tmp_name"], $uploadfile)) { 
						$image_url=$base_path.'uploads/news/'.$file_name;
					} else {
						$image_url=''; 
					}
					
    $query = "INSERT INTO `news` (`id`, `title`, `description`,  `image_url`, `created_datetime`,  `modified_datetime`, `status`) VALUES 
                                 (NULL, '$name', '$description','$image_url',  '$created_datetime', '',  '1')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/news.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'edit_news') { $created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_POST['news_id']; 
	$name = $_POST['title']; 
	$description=$_POST['description'];
	
	if($_FILES["update_news_image"]["name"]!="")
{
	
				$file_name=$_FILES["update_news_image"]["name"];
					$uploadfile = '../uploads/news/' . $file_name;  
					if(move_uploaded_file($_FILES["update_news_image"]["tmp_name"], $uploadfile)) { 
						$image_url=$base_path.'uploads/news/'.$file_name;
					}
}
else
{
	$image_url=$_REQUEST['news_image'];
}
    $query = "UPDATE `news` SET  `title`='$name',  `description`='$description', `image_url`='$image_url',`modified_datetime` = '$created_datetime' WHERE `id` = $id";
    if (mysqli_query($con,$query)) {     
		$mess = '1';  
		$tab = 1; 
	} else { 
	$mess = mysqli_error();
	$tab = 1; }
    header('location:../views/news.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteNewsdetails' && isset($_POST['news_id']) && $_POST['news_id'] != '') {
    $query = "DELETE FROM `news` WHERE id=" . $_POST['news_id'];
    if (mysqli_query($con,$query)){  } else { }
}

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_vacancy') { $created_datetime = getCurentDatetime_DBFORMAT();    
    $name = $_POST['title']; $description=$_POST['description']; $email_id=$_POST['email_id']; $contact_no=$_POST['contact_no'];
    $query = "INSERT INTO `vacancies` (`id`, `title`, `description`, `email_id`,`contact_no`, `created_datetime`,  `modified_datetime`, `status`) VALUES 
                                      (NULL, '$name', '$description', '$email_id','$contact_no', '$created_datetime', '',  '1')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/vacancies.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'edit_vacancy') { $created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_POST['vacancy_id']; $name = $_POST['title']; $description=$_POST['description']; $email_id=$_POST['email_id']; $contact_no=$_POST['contact_no'];
    $query = "UPDATE `vacancies` SET `title`='$name', `description`='$description', `email_id`='$email_id',`contact_no`='$contact_no', `modified_datetime` = '$created_datetime' WHERE `id` = $id";
    if (mysqli_query($con,$query)) {     $mess = '1';  $tab = 1; } else { $mess = mysqli_error();$tab = 1; }
    header('location:../views/vacancies.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteVacancydetails' && isset($_POST['vacancy_id']) && $_POST['vacancy_id'] != '') {
    $query = "DELETE FROM `vacancies` WHERE id=" . $_POST['vacancy_id'];
    if (mysqli_query($con,$query)){  } else { }
}

 if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_information') {
	 $created_datetime = getCurentDatetime_DBFORMAT();    
     $description=$_POST['description'];
	  $title=$_POST['title'];
	  $file_name=$_FILES["info_image"]["name"];
					$uploadfile = '../uploads/information/' . $file_name;  
					if(move_uploaded_file($_FILES["info_image"]["tmp_name"], $uploadfile)) { 
						$image_url=$base_path.'uploads/information/'.$file_name;
					} else {
						$image_url=''; 
					}
	  
    $query = "INSERT INTO `information` (`id`,  `title`, `description`, `image_url`,`created_datetime`,  `modified_datetime`, `status`) VALUES 
                                      (NULL, '$title','$description','$image_url', '$created_datetime', '',  '1')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/informations.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'edit_information') { 
$created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_REQUEST['id']; 
	$description=$_REQUEST['description']; 
	$title=$_REQUEST['title'];
	
if($_FILES["update_info_image"]["name"]!="")
{
	
				$file_name=$_FILES["update_info_image"]["name"];
					$uploadfile = '../uploads/information/' . $file_name;  
					if(move_uploaded_file($_FILES["update_info_image"]["tmp_name"], $uploadfile)) { 
						$image_url=$base_path.'uploads/information/'.$file_name;
					}
}
else
{
	$image_url=$_REQUEST['info_image'];
}
 

$query = "UPDATE `information` SET  `title`='$title',  `description`='$description', `image_url`='$image_url',`modified_datetime` = '$created_datetime' WHERE `id` = $id";
    if (mysqli_query($con,$query)) {     
		$mess = '1';  
		$tab = 1; 
	} else { 
	$mess = mysqli_error();
	$tab = 1; }
    header('location:../views/informations.php?&message=' . $mess . '&tab=' . $tab); 
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteInformationdetails' && isset($_POST['information_id']) && $_POST['information_id'] != '') {
    $query = "DELETE FROM `information` WHERE id=" . $_POST['information_id'];
    if (mysqli_query($con,$query)){  } else { }
}     

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_category') { $created_datetime = getCurentDatetime_DBFORMAT();    
    $name = $_POST['name']; 
    $query = "INSERT INTO `category` (`id`, `name`,  `created_datetime`,  `modified_datetime`) VALUES 
                                 (NULL, '$name',  '$created_datetime', '')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/category.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'edit_category') { $created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_POST['category_id']; $name = $_POST['name']; 
    $query = "UPDATE `category` SET  `name`='$name', `modified_datetime` = '$created_datetime' WHERE `id` = $id";
    if (mysqli_query($con,$query)) {     $mess = '1';  $tab = 1; } else { $mess = mysqli_error();$tab = 1; }
    header('location:../views/category.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteCategorydetails' && isset($_POST['category_id']) && $_POST['category_id'] != '') {
    $query = "DELETE FROM `category` WHERE id=" . $_POST['category_id'];
    if (mysqli_query($con,$query)){  } else { }
}

if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_gallery') { 
	$created_datetime = getCurentDatetime_DBFORMAT();    
    $category_id = $_POST['category_id']; 
	$title = $_POST['title'];
     
     foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name)
            {  
                    $file_name=$_FILES["file"]["name"][$key];
					$uploadfile = '../uploads/' . $file_name;  
					if(move_uploaded_file($_FILES["file"]["tmp_name"][$key], $uploadfile)) { 
						$image_url=$base_path.'uploads/'.$file_name;
					} else {
						$img=''; 
					}   
                 // echo $image_url='http://localhost/uploads/'.$img; die;
                     $query = "INSERT INTO `galleries` (`id`,`cat_id`,`title`, `img`,  `created_datetime`,  `modified_datetime`,`status`) VALUES 
                                                    (NULL,'$category_id', '$title', '$image_url',  '$created_datetime', '','1')";
                    if(mysqli_query($con,$query)) { 
					$mess = '1';
					$tab = 1; }else { $mess = '1'; $tab = 1; }
            }
      
   header('location:../views/gallery.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] != "" &&  $_REQUEST['action'] == 'edit_gallery') { 



if($_FILES["new_image"]["name"]!="")
{
	
				$file_name=$_FILES["new_image"]["name"];
					$uploadfile = '../uploads/' . $file_name;  
					if(move_uploaded_file($_FILES["new_image"]["tmp_name"], $uploadfile)) { 
						$image_url=$base_path.'uploads/'.$file_name;
					}
}
else
{
	$image_url=$_REQUEST['image'];
}


	$created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_REQUEST['id']; 
	$category = $_REQUEST['category']; 
    $title = $_REQUEST['title']; 

   $query = "UPDATE `galleries` SET  `cat_id`='$category',  `title`='$title', `img`='$image_url',`modified_datetime` = '$created_datetime' WHERE `id` = $id";
   
   if (mysqli_query($con,$query)) {     
		$mess = '1'; 
		$tab = 1; 
	} 
	else { 
		$mess = mysqli_error();
		$tab = 1; 
	}
    header('location:../views/gallery.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteGallerydetails' && isset($_REQUEST['gallery_id']) && $_REQUEST['gallery_id'] != '') {
	
	
     $query = "DELETE FROM `galleries` WHERE id=".$_REQUEST['gallery_id'];

    if (mysqli_query($con,$query)){  } else { }
}

if (isset($_POST['action']) && $_POST['action'] != "" &&  $_POST['action'] == 'update_contactaboutus') { $created_datetime = getCurentDatetime_DBFORMAT();
    $contact_us=$_POST['contact_us']; $about_us=$_POST['about_us']; 
    $query = "UPDATE `contact_about_us` SET `contact_us`='$contact_us',`about_us`='$about_us' WHERE `id` = 1";
    if (mysqli_query($con,$query)) {     $mess = '1';  $tab = 1; } else { $mess = mysqli_error();$tab = 1; }
    header('location:../views/contact_about_us.php?&message=' . $mess . '&tab=' . $tab);
}



if (isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == 'add_message') {
    
    $created_datetime = getCurentDatetime_DBFORMAT();    
    $message = $_POST['message'];

         $sql = " Select Token From fcm_users";

	$result = mysqli_query($con,$sql);
	$tokens = array();

	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}


	$push_message = array("message" => $message);
	$message_status = send_notification($tokens, $push_message,'alert');
	//echo $message_status;die;
					
    $query = "INSERT INTO `messages` (`id`, `message`,  `created_datetime`,  `modified_datetime`, `status`) VALUES 
                                 (NULL, '$message',   '$created_datetime', '',  '1')";
    if (mysqli_query($con,$query)) { $mess = '1';$tab = 1; }else { $mess = '1'; $tab = 1; }
    header('location:../views/message.php?message=' . $mess . '&tab=' . $tab);
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] != "" &&  $_REQUEST['action'] == 'edit_message') { 
	
	$created_datetime = getCurentDatetime_DBFORMAT();
    $id = $_POST['id']; 
	$message = $_POST['message']; 
	$query = "UPDATE `messages` SET  `message`='$message', `modified_datetime` = '$created_datetime' WHERE `id` = $id";
  
   if (mysqli_query($con,$query)) {     
		$mess = '1';  
		$tab = 1; 
	} else { 
	$mess = mysqli_error();
	$tab = 1; }
    header('location:../views/message.php?&message=' . $mess . '&tab=' . $tab);
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deletemessage' && isset($_REQUEST['message_id']) && $_REQUEST['message_id'] != '') {
     $query = "DELETE FROM `messages` WHERE id=".$_REQUEST['message_id'];
    if (mysqli_query($con,$query)){  } else { }
}


/* MANAGE Details ENDS HERE */
?>