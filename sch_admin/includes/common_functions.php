<?php


function searchJson($obj, $field, $value)
{
    foreach ($obj as $item) {
        foreach ($item as $child) {
            if (isset($child->$field) && $child->$field == $value) {
                return $child;
            }
        }
    }
    return null;
}

function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function converttoDBdate($dt){
   $Explodedate= explode('/',$dt);
   return $Explodedate[2].'-'.$Explodedate[0].'-'.$Explodedate[1];
}
function getStatus($val){
    if($val==0)
      return 'Disabled'; 
    else
      return 'Enabled';  
}
function convertTonormaltime($mysqltime){
    $timestamp = strtotime($mysqltime);
    return date("g:iA", $timestamp);
}

function clean($string1) {
     $string1 = str_replace(' ', '-', $string1); // Replaces all spaces with hyphens.
               return preg_replace('/[^A-Za-z0-9\-]/', '', $string1); // Removes special chars.
}

function getCurentDatetime_DBFORMAT() {
               return date("Y-m-d H:i:s"); 
}
function getCurrent24HourFormatTime(){
               return date('h:i', time());
}
function getDBTONORMALDATETIME($datetime){
        $time = strtotime($datetime);
        return date("d-m-y g:i A", $time);
}
function getDBTONORMALDATE($datetime){
        $time = strtotime($datetime);
        return date("d-m-y", $time);
}
function getLocationname($id){
    $select_location = "select location_id,name from location where location_id=" . $id;
    $select_location_res = mysql_query($select_location);
    $select_num_rows = mysql_num_rows($select_location_res);
    if($select_num_rows>0){
        while ($select_location_row = mysql_fetch_array($select_location_res)) {
            return $select_location_row['name'];
        } 
    }else{
        return '-';
    }
}

function getSelectedCity($state_id, $city) {
    $select_state = "select * from location where parent_id=$state_id"; $select_res_state = mysql_query($select_state);
    while ($select_row_state = mysql_fetch_array($select_res_state)) {
        ?>
        return <option <?php if ($city == $select_row_state['location_id']) { ?> selected="selected"<?php } ?> value="<?php echo $select_row_state['location_id']; ?>"><?php echo $select_row_state['name']; ?></option>';  
        <?php
    }
}

//SEO Meta Tags Starts Here
function get_seometags($condition) {
    $select_metatags_query = "select * from seo_meta_tags ";
    $select_metatags_res = mysql_query($select_metatags_query); $select_metatags_num_rows = mysql_num_rows($select_metatags_res);
    if ($condition == 1) {
        if ($select_metatags_num_rows > 0) {
            while ($select_metatags_row = mysql_fetch_array($select_metatags_res)) {
                $rowsMeta[] = $select_metatags_row['id'] . '-' . $select_metatags_row['name'] . '-' . $select_metatags_row['status'];
            }
            return $rowsMeta;
        } else { return $select_metatags_num_rows; }
    } else {
        return $select_metatags_num_rows;
    }
}
//SEO Meta Tags Ends Here

//SEO URL Starts Here
function get_seourl($condition) {
    $select_url_query = "select * from seo_url";
    $select_url_res = mysql_query($select_url_query); $select_url_numrows = mysql_num_rows($select_url_res);
    if ($condition == 1) {
        if ($select_url_numrows > 0) {
            while ($select_url_row = mysql_fetch_array($select_url_res)) {
                $rowsURL[] = $select_url_row['id'] . '-' . $select_url_row['url'] . '-' . $select_url_row['status'];
            }
            return $rowsURL;
        } else { return $select_url_numrows; }
    } else {
        return $select_url_numrows;
    }
}
//SEO URL Ends Here

function get_seourltags($condition) {
    $select_url_query1 = "select SEO.id as seo_id,URL.id as url_id,URL.url as url from seo_url_metatags as SEO INNER JOIN seo_url as URL ON SEO.url_id=URL.id INNER JOIN seo_meta_tags as TAGS ON SEO.metatag_id=TAGS.id group by SEO.url_id";
    $select_url_res1 = mysql_query($select_url_query1); $select_url_numrows1 = mysql_num_rows($select_url_res1);
    if ($condition == 1) {
        if ($select_url_numrows1 > 0) {
            while ($select_url_row1 = mysql_fetch_array($select_url_res1)) {
                $rowsURL1[] = $select_url_row1['url_id'] . '-' . $select_url_row1['url'];
            }
            return $rowsURL1;
        } else { return $select_url_numrows1; }
    } else {
        return $select_url_numrows1;
    }
}

function get_seourltags_db($id,$tag_id) {
    $select_seo_query1 = "SELECT SEO.id as seo_id,SEO.content as content,URL.id as url_id,URL.url as url,TAGS.id as tags_id,TAGS.name as tags_name from seo_url_metatags as SEO INNER JOIN seo_url as URL ON SEO.url_id=URL.id INNER JOIN seo_meta_tags as TAGS ON SEO.metatag_id=TAGS.id WHERE TAGS.id=".$tag_id." and SEO.url_id=".$id;
    $select_seo_res1 = mysql_query($select_seo_query1); $select_seo_num_rows1 = mysql_num_rows($select_seo_res1);
        if ($select_seo_num_rows1 > 0) {
            while ($select_seo_row1 = mysql_fetch_array($select_seo_res1)) {
                $rowsURL1[] = $select_seo_row1['seo_id'] . '$' . $select_seo_row1['url_id'] . '$' . $select_seo_row1['url'] . '$' . $select_seo_row1['tags_id']. '$' . $select_seo_row1['tags_name'].'$'.$select_seo_row1['content'];
            }
            return $rowsURL1;
        } else { return $select_seo_num_rows1; }
}
//select box get url
function getURLbox($condition,$id) {
    $select_urls = "select * from seo_url where status=1"; $select_res_urls = mysql_query($select_urls);
    while ($select_row_urls = mysql_fetch_array($select_res_urls)) {
        ?>
                return <option <?php if($condition==1){ if($id==$select_row_urls['id']){ ?> selected="selected"<?php }  } ?>value="<?php echo $select_row_urls['id']; ?>"><?php echo $select_row_urls['url']; ?></option>; 
        <?php
    }
}
//select box get url


function getPageCms($id,$condition) {
    $select_page = "select * from page where status=1"; $select_page_res = mysql_query($select_page);
    while ($select_page_row = mysql_fetch_array($select_page_res)) {
        ?>
        return <option <?php  if($condition==1) { if ($id == $select_page_row['id']) { ?> selected="selected"<?php } } ?> value="<?php echo $select_page_row['id']; ?>"><?php echo $select_page_row['name']; ?></option>';  
        <?php
    }
}

function getPageSelect() {
    $select_page = "select * from page where status=1"; $select_page_res = mysql_query($select_page);
    while ($select_page_row = mysql_fetch_array($select_page_res)) {
        ?>
       return <option value="<?php echo $select_page_row['id']; ?>"><?php echo $select_page_row['name']; ?></option>  
        <?php
    }
}
function getPage() {
    $select_page = "select * from page where status=1"; $select_page_res = mysql_query($select_page);
    while ($select_page_row = mysql_fetch_array($select_page_res)) {
        $rows[]= $select_page_row['id'];
    }
    return $rows;
}

function get_pageContent($condition) {
    $select_pagecontent_query1 = "SELECT PAGE.name,PAGE.id as page_id,CONTENT.id,CONTENT.content FROM `page_content` as CONTENT INNER JOIN page as PAGE ON CONTENT.page_id=PAGE.id";
    $select_pagecontent_res1 = mysql_query($select_pagecontent_query1); $select_pagecontent_num_rows = mysql_num_rows($select_pagecontent_res1);
    if ($condition == 1) {
        if ($select_pagecontent_num_rows > 0) {
            while ($select_pagecontent_row = mysql_fetch_array($select_pagecontent_res1)) {
                $rowsContent[] = $select_pagecontent_row['id'] . '-' .$select_pagecontent_row['name'] . '-' . $select_pagecontent_row['content'];
            }
            return $rowsContent;
        } else { return $select_pagecontent_num_rows; }
    } else {
        return $select_pagecontent_num_rows;
    }
}

function get_pageContent_db($id,$condition) {
    $select_pagecontent_query2 = "SELECT PAGE.name,PAGE.id as page_id,CONTENT.id,CONTENT.content FROM `page_content` as CONTENT INNER JOIN page as PAGE ON CONTENT.page_id=PAGE.id WHERE CONTENT.id=".$id;
    $select_pagecontent_res2 = mysql_query($select_pagecontent_query2); $select_pagecontent_num_rows2 = mysql_num_rows($select_pagecontent_res2);
    if ($condition == 1) {
        if ($select_pagecontent_num_rows2 > 0) {
            while ($select_pagecontent_row2 = mysql_fetch_array($select_pagecontent_res2)) {
                $rowsContent2 = $select_pagecontent_row2['id'] . 'prs' .$select_pagecontent_row2['page_id'] . 'prs' . $select_pagecontent_row2['content'];
            }
            return $rowsContent2;
        } else { return $select_pagecontent_num_rows2; }
    } else {
        return $select_pagecontent_num_rows2;
    }
}
?>