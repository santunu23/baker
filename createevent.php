<?php
$ename=filter_input(INPUT_POST,'eventname');
$edesc=filter_input(INPUT_POST,'eventarticle');


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'upload_file/'; // upload directory
if(!empty($ename) || !empty($edesc))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";

//include database configuration file
require("db/db.php");
//insert form data in the database
$today=date("d/m/Y");
 $DB->query("INSERT INTO event_management(event_name,event_img_name,event_text,created_at) VALUES(?,?,?,?)", array(
 $ename,$path,$edesc,$today));
$DB->closeConnection();
//echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}
?>