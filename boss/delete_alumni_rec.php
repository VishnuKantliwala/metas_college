<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];

$page = $_GET['page'];
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_alumni where alumni_id=$id");
	while($row = mysqli_fetch_array($sql))
	{
		//image
		@unlink('../alumni/big_img/'.$row['alumni_image']);
		@unlink('../alumni/'.$row['alumni_image']);
		//end of image
		
	}

	$cn->selectdb("delete from tbl_alumni where alumni_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: alumniView.php");

?>
