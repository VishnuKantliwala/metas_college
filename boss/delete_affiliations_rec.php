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
	//mysql_query("delete from tbl_affiliations_features where affiliations_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_affiliations where affiliations_id=$id");
	while($row = mysqli_fetch_assoc($sql))
	{
		
		//end of image
		unlink('../affiliations/'.$row['affiliations_image']);
	  	unlink('../affiliations/big_img/'.$row['affiliations_image']);

		
		// pdf
		@unlink('../affiliations_pdf/'.$row['pdf_file']);
		
		
		
		
	}

	$cn->selectdb("delete from tbl_affiliations where affiliations_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: affiliationsView.php?page=$page");


?>
