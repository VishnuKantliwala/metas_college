<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$tablename=$_GET['tablename'];
$primarykey=$_GET['primarykey'];
$id=$_GET['id'];

$page = $_GET['page'];
	// second event table 
	$sql=  $cn->selectdb("select * from tbl_event where event_id=$id");
	
	while($row = $cn->fetchAssoc($sql))
	{
		//image
		@unlink('../event/big_img/'.$row['image_name']);
		@unlink('../event/'.$row['image_name']);
		//end of image
		
		//multiple images
		$image_list = explode(',',$row['multi_images']);

		foreach($image_list as $rowF)
		{
			//print_r($image_list);die;
			$new_image_list = '';
			@unlink('../eventF/big_img/'.$rowF);
			@unlink('../eventF/'.$rowF);
		}
		
		
		
	}

	$cn->selectdb("delete from tbl_event where event_id=$id");

	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location: eventView.php?page=$page");

?>
