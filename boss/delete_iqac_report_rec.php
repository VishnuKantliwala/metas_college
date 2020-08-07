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
	//mysql_query("delete from tbl_iqac_report_features where iqac_report_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_iqac_report where iqac_report_id=$id");
	while($row = mysqli_fetch_assoc($sql))
	{
		
		//end of image
		
		// pdf
		@unlink('../iqac_report_pdf/'.$row['pdf_file']);
		
		
		
		
	}

	$cn->selectdb("delete from tbl_iqac_report where iqac_report_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: iqac_reportView.php?page=$page");


?>
