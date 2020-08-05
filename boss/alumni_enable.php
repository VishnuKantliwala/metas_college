<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];
	// second product table 
	
	$cn->selectdb("UPDATE tbl_alumni SET `status`=1 where alumni_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: alumniView.php");

?>
