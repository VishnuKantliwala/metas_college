<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();

 
 
	  
  $parseurl=parse_url($_SERVER['HTTP_REFERER']);
  //echo "<br/>";
 // echo $parseurl['path'];die;

	  
	  if(isset($_POST['addProduct']))
	  {
	     // print_r($_POST);

			$iqac_report_name=$_POST['iqac_report_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			// $single_image = createImage('frontimg', "../iqac_report/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('iqac_report_file', "../iqac_report_pdf/");
			
			//--------------------		
			//end of pdf
			//--------------------
	
			
		
			
		$con->insertdb("INSERT INTO `tbl_iqac_report` (
							`iqac_report_name` ,
							`description` ,
							`pdf_file`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$iqac_report_name."','".$description."', '".$pdf_file."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");
					
			
			header("location:iqac_reportView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$iqac_report_id=$_POST['iqac_report_id'];
   			$iqac_report_name=$_POST['iqac_report_name'];
			$slug=$_POST['slug'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			//$cat_id=$_POST['cat_id'];
			
			
			
			$frontimg2=$_POST['frontimg2'];

		    $frontimgpdf2=$_POST['frontimgpdf2'];
	
			
			
			//------------------------
			//pdf
			//------------------------
			
			if($_FILES["iqac_report_file"]["error"]>0)
				{
				
					$con->insertdb("UPDATE `tbl_iqac_report` SET iqac_report_name='".$iqac_report_name."',description='".$description."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',pdf_file='".$frontimgpdf2."'  where iqac_report_id='".$iqac_report_id."'");
				}
				else
				{
				
				@unlink("../iqac_report_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('iqac_report_file',"../iqac_report_pdf/");

				$con->insertdb("UPDATE `tbl_iqac_report` SET iqac_report_name='".$iqac_report_name."',description='".$description."',pdf_file='".$pdf_file."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where iqac_report_id='".$iqac_report_id."'");
				}

			 		
			//-----------------				
			//end of pdf
			//--------------------
			
			
			
			header("location:iqac_reportView.php");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_iqac_reportcategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../iqac_reportcategory/'.$row[4]);
	  unlink('../iqac_reportcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_iqac_reportcategory set cat_image='' where cat_id = '".$id."'");
	header("location: iqac_reportcategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_iqac_report where iqac_report_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../iqac_report/'.$row[4]);
	  unlink('../iqac_report/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_iqac_report set iqac_report_image='' where iqac_report_id = '".$id."'");
	header("location: iqac_report_up.php?iqac_report_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_iqac_report where iqac_report_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../iqac_report_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_iqac_report set pdf_file='' where iqac_report_id = '".$id."'");
	header("location: iqac_report_up.php?iqac_report_id=".$id."&page=".$page);


}	

?>