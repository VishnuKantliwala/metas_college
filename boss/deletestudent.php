<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();


if($_GET['Del']== 'del')
{
$id=  $_GET['id'];
$page= $_GET['page'];

	$sql=mysqli_query($cn->getConnection(),"select * from tbl_student where student_id=$id");
	while($row = $cn->fetchAssoc($sql))
	{
		unlink("../student/". $row['image_name']);	
		unlink("../student/big_img/". $row['image_name']);
		
			
	}
	mysqli_query($cn->getConnection(),"delete from tbl_student where student_id=$id");
	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location:studentView.php?page=$page");	
}
