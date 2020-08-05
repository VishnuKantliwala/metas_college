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

			$alumni_fname=$_POST['alumni_fname'];
            $alumni_lname=$_POST['alumni_lname'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];
            $nationality=$_POST['nationality'];
            $country=$_POST['country'];
            $bdate=$_POST['bdate'];
            $marital_status=$_POST['marital_status'];
            $course=$_POST['course'];
            $year_of_completion=$_POST['year_of_completion'];
            $current_position=$_POST['current_position'];
            
            $meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../alumni/");		
				
			// end of single image
			//-------------------------
			
		
		$con->insertdb("INSERT INTO `tbl_alumni` (
							`alumni_fname` ,
							`alumni_lname` ,
							`email` ,
							`gender` ,
							`nationality` ,
							`country` ,
							`bdate` ,
							`marital_status`,
							`course`,
							`year_of_completion`,
							`current_position`,
							`alumni_image`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`slug`,
							`status`
                            )
							VALUES (
							'".$alumni_fname."',
							'".$alumni_lname."',
							'".$email."',
							'".$gender."',
							'".$nationality."',
							'".$country."',
							'".$bdate."',
							'".$marital_status."',
							'".$course."',
							'".$year_of_completion."',
							'".$current_position."',
							'".$single_image."', 
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$slug."',
							1
                            );");
					
			
			header("location:alumniView.php");
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
			$catImage = createImage('frontimg', "../alumnicategory/");			
				
			// end of single image
			//-------------------------
			
			$con->insertdb("insert into tbl_alumni_category(cat_parent_id,cat_name,cat_image,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
			values(".$cat_parent_id.",'".$cat_name."','".$catImage."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");
			header("location: alumniCatView.php?page=$page");
	}
	   
	   
	if(isset($_POST['updateProduct']))
	{
        $alumni_id=$_POST['alumni_id'];    
        $alumni_fname=$_POST['alumni_fname'];
            $alumni_lname=$_POST['alumni_lname'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];
            $nationality=$_POST['nationality'];
            $country=$_POST['country'];
            $bdate=$_POST['bdate'];
            $marital_status=$_POST['marital_status'];
            $course=$_POST['course'];
            $year_of_completion=$_POST['year_of_completion'];
            $current_position=$_POST['current_position'];


			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];				  		
			//$cat_id=$_POST['cat_id'];
			
			
			
			$frontimg2=$_POST['frontimg2'];

			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
            {
            
                $con->insertdb("UPDATE `tbl_alumni` SET alumni_fname='".$alumni_fname."', alumni_lname='".$alumni_lname."', email='".$email."', gender='".$gender."', nationality='".$nationality."', country='".$country."', bdate='".$bdate."', marital_status='".$marital_status."', course='".$course."', year_of_completion='".$year_of_completion."', current_position='".$current_position."', alumni_image='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where alumni_id='".$alumni_id."'");
                // echo "UPDATE `tbl_alumni` SET alumni_fname='".$alumni_fname."', alumni_lname='".$alumni_lname."', email='".$email."', gender='".$gender."', nationality='".$nationality."', country='".$country."', bdate='".$bdate."', marital_status='".$marital_status."', year_of_completion='".$year_of_completion."', current_position='".$current_position."', image_name='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where alumni_id='".$alumni_id."'";
             
            }
            else
            {
				
				@unlink("../alumni/big_img/". $frontimg2);
			    @unlink("../alumni/". $frontimg2);
				$single_image = createImage('frontimg',"../alumni/");

				$con->insertdb("UPDATE `tbl_alumni` SET alumni_fname='".$alumni_fname."',alumni_lname='".$alumni_lname."', email='".$email."', gender='".$gender."', nationality='".$nationality."', country='".$country."', bdate='".$bdate."', marital_status='".$marital_status."', course='".$course."', year_of_completion='".$year_of_completion."', current_position='".$current_position."',alumni_image='".$single_image."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where alumni_id='".$alumni_id."'");
				
			}

			// end of image
		header("location:alumniView.php");
			
			
	}

	if(isset($_POST['updateProduct2']))
	{
        $alumni_id=$_POST['alumni_id'];    
        $alumni_fname=$_POST['alumni_fname'];
            $alumni_lname=$_POST['alumni_lname'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];
            $nationality=$_POST['nationality'];
            $country=$_POST['country'];
            $bdate=$_POST['bdate'];
            $marital_status=$_POST['marital_status'];
            $course=$_POST['course'];
            $year_of_completion=$_POST['year_of_completion'];
            $current_position=$_POST['current_position'];


			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];				  		
			//$cat_id=$_POST['cat_id'];
			
			
			
			$frontimg2=$_POST['frontimg2'];

			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
            {
            
                $con->insertdb("UPDATE `tbl_alumni` SET alumni_fname='".$alumni_fname."', alumni_lname='".$alumni_lname."', email='".$email."', gender='".$gender."', nationality='".$nationality."', country='".$country."', bdate='".$bdate."', marital_status='".$marital_status."', course='".$course."', year_of_completion='".$year_of_completion."', current_position='".$current_position."', alumni_image='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."', `status`=1  where alumni_id='".$alumni_id."'");
             
            }
            else
            {
				
				@unlink("../alumni/big_img/". $frontimg2);
			    @unlink("../alumni/". $frontimg2);
				$single_image = createImage('frontimg',"../alumni/");

				$con->insertdb("UPDATE `tbl_alumni` SET alumni_fname='".$alumni_fname."',alumni_lname='".$alumni_lname."', email='".$email."', gender='".$gender."', nationality='".$nationality."', country='".$country."', bdate='".$bdate."', marital_status='".$marital_status."', course='".$course."', year_of_completion='".$year_of_completion."', current_position='".$current_position."',alumni_image='".$single_image."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',`status`=1 where alumni_id='".$alumni_id."'");
				
			}

			// end of image
		header("location:alumniRequestView.php");
			
			
	}
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_alumni_category where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../alumnicategory/'.$row[4]);
	  unlink('../alumnicategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_alumni_category set cat_image='' where cat_id = '".$id."'");
	header("location: alumniCategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_alumni where alumni_id=".$id."");
	while($row=mysqli_fetch_array($records))
	{
	  unlink('../alumni/'.$row['alumni_image']);
	  unlink('../alumni/big_img/'.$row['alumni_image']);

	}
	$con->selectdb("update tbl_alumni set alumni_image='' where alumni_id = '".$id."'");
	header("location: alumni_up.php?alumni_id=".$id."&page=".$page);


}	

?>