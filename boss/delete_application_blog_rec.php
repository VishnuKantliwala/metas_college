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
	//mysql_query("delete from tbl_application_blog_features where application_blog_id=$id");
	
	// second product table 
	$sql=  $cn->selectdb("select * from tbl_application_blog where application_blog_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		//image
		@unlink('../application_blog/big_img/'.$row[4]);
		@unlink('../application_blog/'.$row[4]);
		//end of image
		
		// pdf
		@unlink('../download_pdf/'.$row[8]);
		
		//multiple images
		$image_list = explode(',',$row[13]);

		foreach($image_list as $rowF)
		{
			//print_r($image_list);die;
			$new_image_list = '';
			@unlink('../application_blogF/big_img/'.$rowF);
			@unlink('../application_blogF/'.$rowF);
		}
		
		
		
	}

	$cn->selectdb("delete from tbl_application_blog where application_blog_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: applicationBlogView.php?page=$page");


?>
