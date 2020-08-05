<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();


if($_GET['Del']== 'del')
{
$id=  $_GET['id'];
$page= $_GET['page'];

	$sql=mysqli_query($cn->getConnection(),"select * from tbl_govlink where govlink_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		unlink("../govlink/". $row[2]);	
		unlink("../govlink/big_img/". $row[2]);
		
			
	}
	mysqli_query($cn->getConnection(),"delete from tbl_govlink where govlink_id=$id");
	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location:govlinkView.php?page=$page");	
}

function deleteRecruiter($id)
{
	$cn=new connect();
	$cn->connectdb();
	$id = $id;

	$sql=  $cn->selectdb("select * from tbl_govlink where govlink_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		//image
		@unlink('../govlink/big_img/'.$row[2]);
		@unlink('../govlink/'.$row[2]);
		//end of image
	}

	$cn->selectdb("delete from tbl_govlink where govlink_id=$id");

}

?>


