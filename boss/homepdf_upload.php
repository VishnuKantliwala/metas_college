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

			$homepdf_name=$_POST['homepdf_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			// $single_image = createImage('frontimg', "../homepdf/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('homepdf_file', "../homepdf_pdf/");
			
			//--------------------		
			//end of pdf
			//--------------------
	
			
		
			
		$con->insertdb("INSERT INTO `tbl_homepdf` (
							`homepdf_name` ,
							`description` ,
							`pdf_file`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$homepdf_name."','".$description."', '".$pdf_file."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");
					
			
			header("location:homepdfView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$homepdf_id=$_POST['homepdf_id'];
   			$homepdf_name=$_POST['homepdf_name'];
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
			
			if($_FILES["homepdf_file"]["error"]>0)
				{
				
					$con->insertdb("UPDATE `tbl_homepdf` SET homepdf_name='".$homepdf_name."',description='".$description."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',pdf_file='".$frontimgpdf2."'  where homepdf_id='".$homepdf_id."'");
				}
				else
				{
				
				@unlink("../homepdf_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('homepdf_file',"../homepdf_pdf/");

				$con->insertdb("UPDATE `tbl_homepdf` SET homepdf_name='".$homepdf_name."',description='".$description."',pdf_file='".$pdf_file."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where homepdf_id='".$homepdf_id."'");
				}

			 		
			//-----------------				
			//end of pdf
			//--------------------
			
			
			
			header("location:homepdfView.php");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_homepdfcategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../homepdfcategory/'.$row[4]);
	  unlink('../homepdfcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_homepdfcategory set cat_image='' where cat_id = '".$id."'");
	header("location: homepdfcategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_homepdf where homepdf_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../homepdf/'.$row[4]);
	  unlink('../homepdf/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_homepdf set homepdf_image='' where homepdf_id = '".$id."'");
	header("location: homepdf_up.php?homepdf_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_homepdf where homepdf_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../homepdf_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_homepdf set pdf_file='' where homepdf_id = '".$id."'");
	header("location: homepdf_up.php?homepdf_id=".$id."&page=".$page);


}	

?>