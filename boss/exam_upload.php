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

			$exam_name=$_POST['exam_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			// $single_image = createImage('frontimg', "../exam/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('exam_file', "../exam_pdf/");
			
			//--------------------		
			//end of pdf
			//--------------------
	
			
		
			
		$con->insertdb("INSERT INTO `tbl_exam` (
							`exam_name` ,
							`description` ,
							`pdf_file`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$exam_name."','".$description."', '".$pdf_file."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");
					
			
			header("location:examView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$exam_id=$_POST['exam_id'];
   			$exam_name=$_POST['exam_name'];
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
			
			if($_FILES["exam_file"]["error"]>0)
				{
				
					$con->insertdb("UPDATE `tbl_exam` SET exam_name='".$exam_name."',description='".$description."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',pdf_file='".$frontimgpdf2."'  where exam_id='".$exam_id."'");
				}
				else
				{
				
				@unlink("../exam_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('exam_file',"../exam_pdf/");

				$con->insertdb("UPDATE `tbl_exam` SET exam_name='".$exam_name."',description='".$description."',pdf_file='".$pdf_file."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where exam_id='".$exam_id."'");
				}

			 		
			//-----------------				
			//end of pdf
			//--------------------
			
			
			
			header("location:examView.php");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_examcategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../examcategory/'.$row[4]);
	  unlink('../examcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_examcategory set cat_image='' where cat_id = '".$id."'");
	header("location: examcategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_exam where exam_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../exam/'.$row[4]);
	  unlink('../exam/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_exam set exam_image='' where exam_id = '".$id."'");
	header("location: exam_up.php?exam_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_exam where exam_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../exam_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_exam set pdf_file='' where exam_id = '".$id."'");
	header("location: exam_up.php?exam_id=".$id."&page=".$page);


}	

?>