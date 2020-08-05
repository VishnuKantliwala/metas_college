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

			$affiliations_name=$_POST['affiliations_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../affiliations/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('affiliations_file', "../affiliations_pdf/");
			
			//--------------------		
			//end of pdf
			//--------------------
	
			
		
			
		$con->insertdb("INSERT INTO `tbl_affiliations` (
							`affiliations_name` ,
							`description` ,
							`pdf_file`,
							`affiliations_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							
							`slug`
							
							)
							VALUES (
							'".$affiliations_name."','".$description."', '".$pdf_file."','".$single_image."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."');");

			
			header("location:affiliationsView.php");
			}
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$affiliations_id=$_POST['affiliations_id'];
   			$affiliations_name=$_POST['affiliations_name'];
			$slug=$_POST['slug'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			//$cat_id=$_POST['cat_id'];
			
			
			
			$frontimg2=$_POST['frontimg2'];

		    $frontimgpdf2=$_POST['frontimgpdf2'];
			
	
			// single image
			if($_FILES["frontimg"]['error'] <= 0)// it means no new image selected insert previous one......
			{
			
				
				
				@unlink("../affiliations/big_img/". $frontimg2);
			    @unlink("../affiliations/". $frontimg2);
				$single_image = createImage('frontimg',"../affiliations/");

				$con->insertdb("UPDATE `tbl_affiliations` SET affiliations_image='".$single_image."'  where affiliations_id='".$affiliations_id."'");
			}
			
			
			//------------------------
			//pdf
			//------------------------
			
			if($_FILES["affiliations_file"]["error"]>0)
				{
				
					$con->insertdb("UPDATE `tbl_affiliations` SET affiliations_name='".$affiliations_name."',description='".$description."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',pdf_file='".$frontimgpdf2."'  where affiliations_id='".$affiliations_id."'");
				}
				else
				{
				
				@unlink("../affiliations_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('affiliations_file',"../affiliations_pdf/");

				$con->insertdb("UPDATE `tbl_affiliations` SET affiliations_name='".$affiliations_name."',description='".$description."',pdf_file='".$pdf_file."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where affiliations_id='".$affiliations_id."'");
				}

			 		
			//-----------------				
			//end of pdf
			//--------------------
			
			
			
			header("location:affiliationsView.php");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_affiliationscategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../affiliationscategory/'.$row[4]);
	  unlink('../affiliationscategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_affiliationscategory set cat_image='' where cat_id = '".$id."'");
	header("location: affiliationscategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_affiliations where affiliations_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../affiliations/'.$row[4]);
	  unlink('../affiliations/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_affiliations set affiliations_image='' where affiliations_id = '".$id."'");
	header("location: affiliations_up.php?affiliations_id=".$id."&page=".$page);


}	
if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_affiliations where affiliations_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  @unlink('../affiliations_pdf/'.$row[6]);

	}
	$con->selectdb("update tbl_affiliations set pdf_file='' where affiliations_id = '".$id."'");
	header("location: affiliations_up.php?affiliations_id=".$id."&page=".$page);


}	

?>