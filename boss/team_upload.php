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
				
				$con->insertdb("UPDATE `tbl_team_category` SET cat_name='".$cat_name."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}
				else
				{
				
				@unlink("../teamcategory/big_img/". $frontimg2);
			    @unlink("../teamcategory/". $frontimg2);
				$catImage = createImage('frontimg',"../teamcategory/");

				$con->insertdb("UPDATE `tbl_team_category` SET cat_name='".$cat_name."',cat_image='".$catImage."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}

			// end of image
			
				
				
	         header("location: teamCatView.php?page=$page");

	  }
	  
	if(isset($_POST['addProduct']))
	{
	     // print_r($_POST);

			$team_title=$_POST['team_title'];
			$description=$_POST['description'];
			$meta_tag_title=$_POST['meta_tag_title'];
			$meta_tag_description=$_POST['meta_tag_description'];
			$meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
		    $slug=$_POST['slug'];
			
			//single image 
			//----------------------
			$single_image = createImage('frontimg', "../team/");		
				
			// end of single image
			//-------------------------
			
		$catID = '';
		//get multiple value of radio (multiple categories)
		foreach ($_POST['mulradio'] as $attributeKey => $attributes){
			// echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
			$catID.= $_POST['mulradio'][$attributeKey].",";
		} //foreach
			
		$con->insertdb("INSERT INTO `tbl_team` (
							`team_title` ,
							`description` ,
							`cat_id`,
							`image_name`,
							`meta_tag_title`,
							`meta_tag_description`,
							`meta_tag_keywords`,
							`slug`)
							VALUES (
							'".$team_title."',
							'".$description."', 
							'".$catID."', 
							'".$single_image."', 
							'".$meta_tag_title."', 
							'".$meta_tag_description."', 
							'".$meta_tag_keywords."', 
							'".$slug."');");
					
			
			header("location:teamView.php");
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
			$catImage = createImage('frontimg', "../teamcategory/");			
				
			// end of single image
			//-------------------------
			
			$con->insertdb("insert into tbl_team_category(cat_parent_id,cat_name,cat_image,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
			values(".$cat_parent_id.",'".$cat_name."','".$catImage."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");
			header("location: teamCatView.php?page=$page");
	}
	   
	   
	if(isset($_POST['updateProduct']))
	{
			$catID ='';
			$team_id=$_POST['team_id'];
			$team_title=$_POST['team_title'];
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

			// single image
			if($_FILES["frontimg"]['error'] > 0)// it means no new image selected insert previous one......
				{
				
					$con->insertdb("UPDATE `tbl_team` SET team_title='".$team_title."',description='".$description."',cat_id='".$catID."',image_name='".$frontimg2."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."'  where team_id='".$team_id."'");
					echo "1";
				}
				else
				{
				
				@unlink("../team/big_img/". $frontimg2);
			    @unlink("../team/". $frontimg2);
				$single_image = createImage('frontimg',"../team/");

				$con->insertdb("UPDATE `tbl_team` SET team_title='".$team_title."',description='".$description."',cat_id='".$catID."',image_name='".$single_image."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where team_id='".$team_id."'");
				echo "2";
				}

			// end of image
			header("location:teamView.php?page=$page");
			
			
	}
	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_team_category where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../teamcategory/'.$row[4]);
	  unlink('../teamcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_team_category set cat_image='' where cat_id = '".$id."'");
	header("location: teamCategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_team where team_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../team/'.$row[1]);
	  unlink('../team/big_img/'.$row[1]);

	}
	$con->selectdb("update tbl_team set image_name='' where team_id = '".$id."'");
	header("location: team_up.php?team_id=".$id."&page=".$page);


}	

?>