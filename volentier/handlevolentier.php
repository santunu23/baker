<?php 
$fname=filter_input(INPUT_POST,'firstname');
$lname=filter_input(INPUT_POST,'lastname');
$email=filter_input(INPUT_POST,'email');
$password=filter_input(INPUT_POST,'password');
$mobile=filter_input(INPUT_POST,'mobile');
$address=filter_input(INPUT_POST,'address');
$volentierid=filter_input(INPUT_POST,'volentierid');


// //special note: This script need more filter options,which will be added later.
if(
	empty($fname) ||
	empty($lname) ||
	empty($email) ||
	empty($password) ||
	empty($mobile) ||
	empty($message) ||
	!filter_var($email,FILTER_VALIDATE_EMAIL)
  )
{
	echo 'Not valide submit';
}

require("../db/db.php");
$today=date("d/m/Y");
$DB->query("INSERT INTO volunteer_list(fname,lname,email,pass,mobi,addre,volentierid,created_at) VALUES(?,?,?,?,?,?,?,?)", array(
$fname,$lname,$email,$password,$mobile,$address,$volentierid,$today));
$DB->closeConnection();
?>