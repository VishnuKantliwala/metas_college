<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];

//$parseurl=parse_url($_SERVER['HTTP_REFERER']);
//echo $parseurl['path'];die;
$page = $_GET['page'];
	//first delete product features table
	//mysql_query("delete from tbl_iqac_members_features where iqac_members_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_iqac_members where iqac_members_id=$id");
	while($row = mysqli_fetch_assoc($sql))
	{
		
		//end of image
		
		// pdf
		@unlink('../iqac_members_pdf/'.$row['pdf_file']);
		
		
		
		
	}

	$cn->selectdb("delete from tbl_iqac_members where iqac_members_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: iqac_membersView.php?page=$page");


?>
