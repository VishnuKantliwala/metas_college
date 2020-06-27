<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();

 
 
	  
  $parseurl=parse_url($_SERVER['HTTP_REFERER']);
  //echo "<br/>";
 // echo $parseurl['path'];die;

	  if(isset($_POST['updateCategory']))
	  {
	  			$cat_id=$_POST['cat_id'];
				$cat_name=$_POST['cat_name'];
				$page = $_POST['page'];
				$meta_tag_title=$_POST['meta_tag_title'];
				$meta_tag_description=$_POST['meta_tag_description'];
				$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			

                
				$slug=$_POST['slug'];
				$frontimg2=$_POST['frontimg2'];
				//if($frontimg2
				
				// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
				$con->insertdb("UPDATE `tbl_project_category` SET cat_name='".$cat_name."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}
				else
				{
				
				@unlink("../projectcategory/big_img/". $frontimg2);
			    @unlink("../projectcategory/". $frontimg2);
				$catImage = createImage('frontimg',"../projectcategory/");

				$con->insertdb("UPDATE `tbl_project_category` SET cat_name='".$cat_name."',cat_image='".$catImage."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}

			// end of image
			
				
				
	         header("location: projectCatView.php?page=$page");

	  }
	  
	if(isset($_POST['addProject']))
	{
	     // print_r($_POST);

		 $project_name=$_POST['project_name'];
		 $description=$_POST['description'];
		 $meta_tag_title=$_POST['meta_tag_title'];
		 $meta_tag_description=$_POST['meta_tag_description'];
		 $meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		 $slug=$_POST['slug'];
		 
		 $date=$_POST['date'];
		 $month=$_POST['month'];
		 $year=$_POST['year'];  
		 $project_video=$_POST['project_video'];  
		 //single image 
		 //----------------------
		 $single_image = createImage('frontimg', "../project/");			
			 
		 // end of single image
		 //-------------------------
		 
		 //-----------------------------
		 //pdf
		 //-----------------------------
		 
		 $pdf_file = createMultiPDF('download_file', "../download_pdf/");			
		 //--------------------		
		 //end of pdf
		 //--------------------

		 //-------------------
		 // Multiple images
		 //-------------------
		 $images_name = createMultiImage('image_title', "../projectF/");			
		 
		 //-------------------
		 // end of Multiple images
		 //-------------------
		 
 
	 $catID = '';
	 //get multiple value of radio (multiple categories)
	 foreach ($_POST['mulradio'] as $attributeKey => $attributes){
		// echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
		 $catID.= $_POST['mulradio'][$attributeKey].",";
	 } //foreach
	 $RES = $con->insertdb("INSERT INTO `tbl_project` (
						 `project_name` ,
						 `description` ,
						 `cat_id`,
						 `project_image`,
						 `pdf_file`,
						 `meta_tag_title`,
						 `meta_tag_description`,
						 `meta_tag_keywords`,
						 `multi_images`,
						 `slug`,
						 `date`,
						 `month`,
						 `year`,
						 `project_video`
						 )
						 VALUES (
						 '".$project_name."',
						 '".$description."',  
						 '".$catID."', 
						 '".$single_image."', 
						 '".$pdf_file."', 
						 '".$meta_tag_title."', 
						 '".$meta_tag_description."', 
						 '".$meta_tag_keywords."', 
						 '".$images_name."', 
						 '".$slug."', 
						 $date, 
						 '".$month."', 
						 $year, 
						 '".$project_video."' 
						 );");
				 
		 header("location:projectView.php");
		 }
	
	
	   
	if(isset($_POST['addCategory']))
	{
	  
	   
	   		$cat_parent_id=$_POST['cat_parent_id'];
			$page = $_POST['page'];
			$cat_name=$_POST['cat_name'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			
			$slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$catImage = createImage('frontimg', "../projectcategory/");			
				
			// end of single image
			//-------------------------
			
			$con->insertdb("insert into tbl_project_category(cat_parent_id,cat_name,cat_image,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
			values(".$cat_parent_id.",'".$cat_name."','".$catImage."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");
			header("location: projectCatView.php?page=$page");
	}
	   
	if(isset($_POST['updateProject']))
	{
	$catID ='';
	$project_id=$_POST['project_id'];
	$project_name=$_POST['project_name'];
	$slug=$_POST['slug'];
	$date=$_POST['date'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$description=$_POST['description'];
	$page = $_POST['page'];
	$meta_tag_title=$_POST['meta_tag_title'];
	$meta_tag_description=$_POST['meta_tag_description'];
	$meta_tag_keywords=$_POST['meta_tag_keywords'];		
	$project_video=$_POST['project_video'];  
	// $cat_id=$_POST['cat_id'];
	  
	//get multiple value of radio (multiple categories)
	foreach ($_POST['mulradio'] as $attributeKey => $attributes){
		//echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
		$catID.= $_POST['mulradio'][$attributeKey].",";
	} //foreach
	  
	$frontimg2=$_POST['frontimg2'];
	$frontimg1=$_POST['frontimg1'];
	$frontimgpdf2=$_POST['frontimgpdf2'];

	// single image
	if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
	{
	
		$con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."',project_image='".$frontimg2."',multi_images='".$frontimg1."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',date='".$date."',month='".$month."',year='".$year."'  where project_id='".$project_id."'");
	}
	else
	{
		@unlink("../project/big_img/". $frontimg2);
		@unlink("../project/". $frontimg2);
		$single_image = createImage('frontimg',"../project/");

		$con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."',project_image='".$single_image."',multi_images='".$frontimg1."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',date='".$date."',month='".$month."',year='".$year."'  where project_id='".$project_id."'");
	}

	  // end of image
			   
	  //-----------------				
	  //multi pdf
	  //--------------------
				  
	  $size_sum_pdf = array_sum($_FILES['download_file']['size']);
	  if ($size_sum_pdf > 0) 
	  // if($_FILES["download_file"]["name"]=="")
	  {
		  $pdf_file = createMultiPDF('download_file', "../download_pdf/");
		  $records=$con->selectdb("select * from tbl_project where project_id='".$project_id."'");
		  $row=mysqli_fetch_row($records);
		  //echo $row[2]."<br>";
		  //echo $images; die;
		  $final= $row[7].$pdf_file;
		  
		  
		  $con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."', pdf_file='".$final."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where project_id='".$project_id."'");
	  }
	  else
	  {
		  $con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."',pdf_file='".$frontimgpdf2."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where project_id='".$project_id."'");
	  }

			   
			   
	  //-----------------				
	  //end of multi pdf
	  //--------------------
	  
	  
	  //------------------------
	  //multiple images
	  //------------------------
	  
	  $size_sum = array_sum($_FILES['image_title']['size']);
	  if ($size_sum > 0) 
	  {
	   // at least one file has been uploaded
		  
		  $images_name = createMultiImage('image_title', "../projectF/");	
		  $records=$con->selectdb("select * from tbl_project where project_id='".$project_id."'");
		   $row=mysqli_fetch_row($records);
		  //echo $row[2]."<br>";
		  //echo $images; die;
		   $final= $row[11].$images_name;
			  

		  $con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."',multi_images='".$final."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' ,date='".$date."',month='".$month."',year='".$year."' where project_id='".$project_id."'");
			  
		  }
		  else
		  {
		  $con->insertdb("UPDATE `tbl_project` SET project_name='".$project_name."',description='".$description."',cat_id='".$catID."',multi_images='".$frontimg1."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  ,date='".$date."',month='".$month."',year='".$year."' where project_id='".$project_id."'");	
		  }

	  //-----------------				
	  //end of multiple images
	  //--------------------
	  
	  header("location:projectView.php?page=$page");
	  
	  
	 }

	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_project_category where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../projectcategory/'.$row[4]);
	  unlink('../projectcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_project_category set cat_image='' where cat_id = '".$id."'");
	header("location: projectCategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_project where project_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../project/'.$row[4]);
	  unlink('../project/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_project set project_image='' where project_id = '".$id."'");
	header("location: project_up.php?project_id=".$id."&page=".$page);


}	


//multiple image delete project..
if(isset($_REQUEST["btnDeleteImages"]))
{
	$project_id = $_POST['project_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../projectF/big_img/'.$row);
			 @unlink('../projectF/'.$row);
		}
		
		$con->selectdb("update tbl_project set multi_images='".$image."' where project_id = '".$project_id."'");
		header("location: project_up.php?project_id=".$project_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
}

//multiple pdf delete project..
 if(isset($_REQUEST["btnDeletepdfs"]))
{
	$project_id = $_POST['project_id'];
	$page = $_POST['page'];

	$pdf = $_POST['frontpdf'];
	$pdf_list = explode(',',$pdf);
	$new_pdf_list = '';
	
	if(isset($_REQUEST["pdfEdit"]))
	{
		foreach($_REQUEST['pdfEdit'] as $row)
		{
			 $pdf = str_replace($row.',' , '' ,$pdf);
			 @unlink('../download_pdf/'.$row);
		}
		
		$con->selectdb("update tbl_project set pdf_file='".$pdf."' where project_id = '".$project_id."'");
		header("location: project_up.php?project_id=".$project_id."&page=".$page);
	}
	else
	{
		echo 'No pdf selected';
	}
		
}


?>