<?php
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();


if($_GET['Del']== 'del')
{
    $id=  $_GET['id'];
    $page= $_GET['page'];

	
	
	mysqli_query($cn->getConnection(),"delete from tbl_news where news_id=$id");
	//$cn->Deletedata($tablename,$primarykey,$id);
	header("location:newsView.php?page=$page");	
}

function deleteRecruiter($id)
{
	$cn=new connect();
	$cn->connectdb();
	$id = $id;

	

	$cn->selectdb("delete from tbl_news where news_id=$id");

}

?>


