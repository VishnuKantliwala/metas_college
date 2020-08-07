<?php
include_once("../connect.php");
include_once("image_lib_rname.php"); 

$con=new connect();
$con->connectdb();
$link_url="../".$con->setdomain();
 date_default_timezone_set("Asia/Kolkata");
 
	  
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
				
				$con->insertdb("UPDATE `tbl_eventcategory` SET cat_name='".$cat_name."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}
				else
				{
				
				@unlink("../eventcategory/big_img/". $frontimg2);
			    @unlink("../eventcategory/". $frontimg2);
				$catImage = createImage('frontimg',"../eventcategory/");

				$con->insertdb("UPDATE `tbl_eventcategory` SET cat_name='".$cat_name."',cat_image='".$catImage."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}

			// end of image
			
				
				
	         header("location: eventCatView.php?page=$page");

	  }
	  if(isset($_POST['addProduct']))
	{
	     // print_r($_POST);

			$event_title=$_POST['event_title'];
			$event_date=$_POST['event_date'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../event/");		
				
			// end of single image
			//-------------------------

			//-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../eventF/");	

			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('event_file', "../event_pdf/");
			
			//--------------------		
			//end of pdf
			//--------------------


			
		$catID = '';
		//get multiple value of radio (multiple categories)
		foreach ($_POST['mulradio'] as $attributeKey => $attributes){
			// echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
			$catID.= $_POST['mulradio'][$attributeKey].",";
		} //foreach
			
		$con->insertdb("INSERT INTO `tbl_event` (
							`event_title` ,
							`description` ,
							`cat_id`,
							`image_name`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`slug`,
                            `event_date`,
							`multi_images`,
							`pdf_file`
                            )
							VALUES (
							'".$event_title."',
							'".$description."', 
							'".$catID."', 
							'".$single_image."', 
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$slug."',
                            '".$event_date."',
							'".$images_name."',
							'".$pdf_file."'
                            );");
					
			
			header("location:eventView.php");
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
			$catImage = createImage('frontimg', "../eventcategory/");			
				
			// end of single image
			//-------------------------
			
			$con->insertdb("insert into tbl_eventcategory(cat_parent_id,cat_name,cat_image,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
			values(".$cat_parent_id.",'".$cat_name."','".$catImage."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");
			header("location: eventCatView.php?page=$page");
	   }
	   
	   
	   if(isset($_POST['updateProduct']))
	   {
			   $catID ='';
			   $event_id=$_POST['event_id'];
			   $event_title=$_POST['event_title'];
			   $event_date=$_POST['event_date'];
			   $description=$_POST['description'];
			   $meta_tag_title=$_POST['meta_tag_title'];
			   $meta_tag_description=$_POST['meta_tag_description'];
			   $meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
			   $slug=$_POST['slug'];				  		
			   //$cat_id=$_POST['cat_id'];
			   
			   //get multiple value of radio (multiple categories)
			   foreach ($_POST['mulradio'] as $attributeKey => $attributes){
			  //echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
			   
				   $catID.= $_POST['mulradio'][$attributeKey].",";
			   } //foreach
			   
			   $frontimg2=$_POST['frontimg2'];
			   $frontimgpdf2=$_POST['frontimgpdf2'];
   
			   // single image
			   if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				   {
				   
					   $con->insertdb("UPDATE `tbl_event` SET event_title='".$event_title."',description='".$description."',cat_id='".$catID."',image_name='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', event_date = '".$event_date."'  where event_id='".$event_id."'");
					   echo "1";
				   }
				   else
				   {
				   
				   @unlink("../event/big_img/". $frontimg2);
				   @unlink("../event/". $frontimg2);
				   $single_image = createImage('frontimg',"../event/");
   
				   $con->insertdb("UPDATE `tbl_event` SET event_title='".$event_title."',description='".$description."',cat_id='".$catID."',image_name='".$single_image."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', event_date = '".$event_date."' where event_id='".$event_id."'");
				   echo "2";
				   }
   
			   // end of image
   
			   //------------------------
			   //multiple images
			   //------------------------
			   
			   $size_sum = array_sum($_FILES['image_title']['size']);
			   if ($size_sum > 0) 
			   {
				// at least one file has been uploaded
				   
				   $images_name = createMultiImage('image_title', "../eventF/");	
				   $records=$con->selectdb("select * from tbl_event where event_id='".$event_id."'");
					$row=mysqli_fetch_assoc($records);
				   //echo $row[2]."<br>";
				   //echo $images; die;
					$final= $row['multi_images'].$images_name;
					   
   
				   $con->insertdb("UPDATE `tbl_event` SET multi_images='".$final."'  where event_id='".$event_id."'");
					   
			   }
   
			   //-----------------				
			   //end of multiple images
			   //--------------------

			   //------------------------
			//pdf
			//------------------------
			
			if($_FILES["event_file"]["error"] <= 0)
			{
			
				@unlink("../event_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('event_file',"../event_pdf/");

				$con->insertdb("UPDATE `tbl_event` SET pdf_file='".$pdf_file."'  where event_id='".$event_id."'");
			}

				 
		//-----------------				
		//end of pdf
		//--------------------
		
   
			   header("location:eventView.php?page=$page");
			   
			   
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_eventcategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../eventcategory/'.$row[4]);
	  unlink('../eventcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_eventcategory set cat_image='' where cat_id = '".$id."'");
	header("location: eventcategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_event where event_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../event/'.$row[1]);
	  unlink('../event/big_img/'.$row[1]);

	}
	$con->selectdb("update tbl_event set image_name='' where event_id = '".$id."'");
	header("location: event_up.php?event_id=".$id."&page=".$page);


}	

if(isset($_GET["PDF"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_event where event_id=".$id."");
	while($row=mysqli_fetch_array($records))
	{
	  @unlink('../event_pdf/'.$row['pdf_file']);

	}
	$con->selectdb("update tbl_event set pdf_file='' where event_id = '".$id."'");
	header("location: event_up.php?event_id=".$id."&page=".$page);


}	
//multiple image delete Product..
if(isset($_REQUEST["btnDeleteImages"]))
{
	$event_id = $_POST['event_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../eventF/big_img/'.$row);
			 @unlink('../eventF/'.$row);
		}
		
		$con->selectdb("update tbl_event set multi_images='".$image."' where event_id = '".$event_id."'");
		header("location: event_up.php?event_id=".$event_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
}
?>