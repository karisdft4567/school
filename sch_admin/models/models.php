<?php

function convertDBDATE($dates){
    $date1=explode('/',$dates); $date=$date1[1]; $month=$date1[0]; $year=$date1[2];
    return preg_replace('/\s+/', '', $year.'-'.$month.'-'.$date);
}

function getlocation($con,$id){
    $select_siteuser = mysqli_query($con,"SELECT * from location WHERE location_id=".$id);
    $select_siteusers_num_rows = mysqli_num_rows($select_siteuser);
        if ($select_siteusers_num_rows > 0) {
        while ($select_siteuser_row = mysqli_fetch_array($select_siteuser)) {
           return $select_siteuser_row['name'];
        }
    }else{ return''; }
}
function getEventname($con,$id){
    $select_siteuser = mysqli_query($con,"SELECT * from events WHERE id=".$id);
    $select_siteusers_num_rows = mysqli_num_rows($select_siteuser);
        if ($select_siteusers_num_rows > 0) {
        while ($select_siteuser_row = mysqli_fetch_array($select_siteuser)) {
           return $select_siteuser_row['name'];
        }
    }else{ return''; }
}
function get_eventdetail($con,$id){
    $sql_res= "SELECT CUSTOMER.* FROM events as CUSTOMER WHERE CUSTOMER.id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}

function get_allevents($con){
    $select_siteusers_query = "SELECT CUSTOMER.* FROM events as CUSTOMER";  $select_siteusers_res = mysqli_query($con,$select_siteusers_query); $select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
        if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}   

function getNewsname($con,$id){
    $select_siteuser = mysqli_query($con,"SELECT * from news WHERE id=".$id);
    $select_siteusers_num_rows = mysqli_num_rows($select_siteuser);
        if ($select_siteusers_num_rows > 0) {
        while ($select_siteuser_row = mysqli_fetch_array($select_siteuser)) {
           return $select_siteuser_row['title'];
        }
    }else{ return''; }
}
function getnewsdetail($con,$id){
    $sql_res= "SELECT CUSTOMER.* FROM news as CUSTOMER WHERE CUSTOMER.id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}

function get_allnews($con){
    $select_siteusers_query = "SELECT CUSTOMER.* FROM news as CUSTOMER";  $select_siteusers_res = mysqli_query($con,$select_siteusers_query); $select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
        if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}   

function getVacancyname($con,$id){
    $select_siteuser = mysqli_query($con,"SELECT * from vacancies WHERE id=".$id);
    $select_siteusers_num_rows = mysqli_num_rows($select_siteuser);
        if ($select_siteusers_num_rows > 0) {
        while ($select_siteuser_row = mysqli_fetch_array($select_siteuser)) {
           return $select_siteuser_row['title'];
        }
    }else{ return''; }
}
function getvacancydetail($con,$id){
    $sql_res= "SELECT CUSTOMER.* FROM vacancies as CUSTOMER WHERE CUSTOMER.id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}

function get_allvacancies($con){
    $select_siteusers_query = "SELECT CUSTOMER.* FROM vacancies as CUSTOMER";  $select_siteusers_res = mysqli_query($con,$select_siteusers_query); $select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
        if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}   

function getInformationname($con,$id){
    $select_siteuser = mysqli_query($con,"SELECT * from vacancies WHERE id=".$id);
    $select_siteusers_num_rows = mysqli_num_rows($select_siteuser);
        if ($select_siteusers_num_rows > 0) {
        while ($select_siteuser_row = mysqli_fetch_array($select_siteuser)) {
           return $select_siteuser_row['title'];
        }
    }else{ return''; }
}
function getinformationdetail($con,$id){
    $sql_res= "SELECT * from information where id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}

function get_allinformations($con){
    $select_siteusers_query = "SELECT * from information"; 
	$select_siteusers_res = mysqli_query($con,$select_siteusers_query);
	$select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
        if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}   
function get_contactaboutus($con){
    $sql_res= "SELECT CUSTOMER.* FROM contact_about_us as CUSTOMER"; $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}   

function getgalleries($con){
    $sql_res= "SELECT * FROM galleries";
	$select_siteusers_res = mysqli_query($con,$sql_res);
	$select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
   if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}

function getgalleriesdetail($con,$id){
    $sql_res= "SELECT * FROM galleries where id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}


function get_allmessage($con){
	
    $select_siteusers_query = "SELECT * from messages"; 
	$select_siteusers_res = mysqli_query($con,$select_siteusers_query);
	$select_siteusers_num_rows = mysqli_num_rows($select_siteusers_res);
        if ($select_siteusers_num_rows > 0) {
            while ($select_siteusers_row = mysqli_fetch_assoc($select_siteusers_res)) {
                $rowsSiteusers[] = $select_siteusers_row;
            }
            return $rowsSiteusers;
        } else { return $select_siteusers_num_rows; }
}


function getmessage($con,$id){
     $sql_res= "SELECT * FROM messages where id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}

function getCategoryname($con,$id){
     $sql_res= "SELECT name FROM category where id=".$id;
    $select_siteuser = mysqli_query($con,$sql_res);
    while ($select_siteuser_row = mysqli_fetch_assoc($select_siteuser)) {
        return $select_siteuser_row;
    }
}




function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return lz($hours).":".lz($minutes).":".lz($seconds);
}

// lz = leading zero
function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}

?>