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

	  
	  
	  if(isset($_POST['addProduct']))
	  {
	     // print_r($_POST);

			$application_blog_name=$_POST['application_blog_name'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
		    $application_blog_video=$_POST['application_blog_video'];
			// $tags=$_POST['tags'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../application_blog/");			
				
			// end of single image
			//-------------------------
			
			//-----------------------------
			//pdf
			//-----------------------------
			
			$pdf_file = createPDF('download_file', "../download_pdf/");			
			
			//--------------------		
			//end of pdf
			//--------------------
	
			//-------------------
			// Multiple images
			//-------------------
			$images_name = createMultiImage('image_title', "../application_blogF/");			
			
			//-------------------
			// end of Multiple images
			//-------------------
			
			//----------------------------
			//display on home page or not
			if (isset($_POST['home_page'])) {
				$home_page=1;
			}
			else
			{
				$home_page=0;
			}
	
		$catID = '';
		
			
		$con->insertdb("INSERT INTO `tbl_application_blog` (
							`application_blog_name` ,
							`description` ,
							`cat_id`,
							`application_blog_image`,
							`pdf_file`,
							`application_blog_video`,
							`bdate`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`multi_images`,
							`slug`
							
							)
							VALUES (
							'".$application_blog_name."',
							'".$description."', 
							'".$catID."', 
							'".$single_image."',
							'".$pdf_file."', 
							'".$application_blog_video."',
							'".date('Y-m-d H:i:s')."', 
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$images_name."',
							'".$slug."');");
							$to="";
							
							
							$contact=$con->selectdb("SELECT * FROM tbl_contact WHERE `con_id`=1");
							while($row_contact = mysqli_fetch_array($contact))
							{
									$from	= $row_contact['email'];
							}
							
							
							$sql=  $con->selectdb("select * from tbl_newsletter_emails ");
							while($row = mysqli_fetch_assoc($sql))
							{
								$to.=", ".$row['email'];
							}
							$to=trim($to,",");
							$subject = "New Blog Available : Wellness";
							$message = file_get_contents("mail.html");
							
							//adding value to mail
							
							$new_message=str_replace("src='images/img-01.jpg'","src='".$link_url."application_blog/big_img/".$single_image."'",$message);
							$new_message=str_replace("title_here",$application_blog_name,$new_message);
							$new_message=str_replace("desc_here",$description,$new_message);
							$new_message=str_replace("link_here",$link_url."Blogdetail/".$slug."/",$new_message);
							
							
							$header = "From: ".$from."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";
							$header.= "bcc: ".$to."\r\n";
							$subject = "New application_blog posted on wellness : " .$application_blog_name;
							$to="";
							mail($to, $subject, $new_message , $header);				
							echo $new_message;
							echo "<script>alert('Message Sent');</script>";
							
			header("location:applicationBlogView.php");
			}
	   
	   
	   
	   
	    if(isset($_POST['updateProduct']))
	  {
	   
			$catID ='';
			$application_blog_id=$_POST['application_blog_id'];
   			$application_blog_name=$_POST['application_blog_name'];
			$slug=$_POST['slug'];
			$description=$_POST['description'];
			$page = $_POST['page'];
			$application_blog_video = $_POST['application_blog_video'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
            
            $frontimg2=$_POST['frontimg2'];
			$frontimg1=$_POST['frontimg1'];
		    $frontimgpdf2=$_POST['frontimgpdf2'];
	
			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
					$con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."',application_blog_image='".$frontimg2."',multi_images='".$frontimg1."',application_blog_video='".$application_blog_video."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where application_blog_id='".$application_blog_id."'");
				}
				else
				{
				
				@unlink("../application_blog/big_img/". $frontimg2);
			    @unlink("../application_blog/". $frontimg2);
				$single_image = createImage('frontimg',"../application_blog/");

				$con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."',application_blog_image='".$single_image."' ,multi_images='".$frontimg1."',application_blog_video='".$application_blog_video."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where application_blog_id='".$application_blog_id."'");
				}

			// end of image
			
			//------------------------
			//pdf
			//------------------------
			
			if($_FILES["download_file"]["name"]=="")
				{
				
					$con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."', application_blog_video='".$application_blog_video."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where application_blog_id='".$application_blog_id."'");
				}
				else
				{
				
				@unlink("../download_pdf/". $frontimgpdf2);

				$pdf_file = createPDF('download_file',"../download_pdf/");

				$con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."',pdf_file='".$pdf_file."' ,application_blog_video='".$application_blog_video."' ,meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where application_blog_id='".$application_blog_id."'");
				}
			 		
			//-----------------				
			//end of pdf
			//--------------------
			
			
			//------------------------
			//multiple images
			//------------------------
			$size_sum = array_sum($_FILES['image_title']['size']);
			if ($size_sum > 0) {
			 // at least one file has been uploaded
			
			 $images_name = createMultiImage('image_title', "../application_blogF/");	
			 
			 $records=$con->selectdb("select * from tbl_application_blog where application_blog_id='".$application_blog_id."'");
			 $row=mysqli_fetch_row($records);
			//echo $row[2]."<br>";
			//echo $images; die;
			 $final= $row[13].$images_name;
					

				$con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."',multi_images='".$final."' , application_blog_video='".$application_blog_video."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where application_blog_id='".$application_blog_id."'");
				
			} else {
			 // no file has been uploaded
			 $con->insertdb("UPDATE `tbl_application_blog` SET application_blog_name='".$application_blog_name."',description='".$description."',cat_id='".$catID."',multi_images='".$frontimg1."', application_blog_video='".$application_blog_video."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where application_blog_id='".$application_blog_id."'");	
				
			}
			
			//-----------------				
			//end of multiple images
			//--------------------
			
			header("location:applicationBlogView.php?page=$page");
			
			
	   }
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_application_blogcategory where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../application_blogcategory/'.$row[4]);
	  unlink('../application_blogcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_application_blogcategory set cat_image='' where cat_id = '".$id."'");
	header("location: application_blogcategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_application_blog where application_blog_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../application_blog/'.$row[4]);
	  unlink('../application_blog/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_application_blog set application_blog_image='' where application_blog_id = '".$id."'");
	header("location: application_blog_up.php?application_blog_id=".$id."&page=".$page);


}	

//multiple images	
 if(isset($_REQUEST["btnDeleteImages"]))
{
	$application_blog_id = $_POST['application_blog_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../application_blogF/big_img/'.$row);
			 @unlink('../application_blogF/'.$row);
		}
		echo $image;
		$con->selectdb("update tbl_application_blog set multi_images='".$image."' where application_blog_id = '".$application_blog_id."'");
		header("location: application_blog_up.php?application_blog_id=".$application_blog_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
} 


if(isset($_GET["btnDeletepdf"]))
	{
		//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_application_blog where application_blog_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
		unlink('../download_pdf/'.$row[8]);
	}
	$con->selectdb("update tbl_application_blog set pdf_file='' where application_blog_id = '".$id."'");
	header("location: application_blog_up.php?application_blog_id=".$id."&page=".$page);
}	
?>