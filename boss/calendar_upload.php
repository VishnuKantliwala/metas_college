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
				
				$con->insertdb("UPDATE `tbl_calendar_category` SET cat_name='".$cat_name."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}
				else
				{
				
				@unlink("../calendarcategory/big_img/". $frontimg2);
			    @unlink("../calendarcategory/". $frontimg2);
				$catImage = createImage('frontimg',"../calendarcategory/");

				$con->insertdb("UPDATE `tbl_calendar_category` SET cat_name='".$cat_name."',cat_image='".$catImage."', meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."' where cat_id=".$cat_id."");
				}

			// end of image

			// insert in tbl_calendar_month table

			$con->insertdb("DELETE from tbl_calendar_month where cat_id = '".$cat_id."' and calendar_month_id NOT IN (".implode(',',$_POST['month_id']).")");

			foreach($_POST['month_days'] as $i => $item) 
			{
				if($_POST['month_days'][$i]!='')
				{
					$month= $_POST['month'][$i]; 
					$month_days= $_POST['month_days'][$i]; 
					
					
					if (isset($_POST['month_id'][$i]))
					{
						$month_id= $_POST['month_id'][$i];
	
						$con->insertdb("update tbl_calendar_month set month='".$month."', month_days='".$month_days."' where calendar_month_id='".$month_id."' ");

						// echo "update tbl_calendar_month set month='".$month."', month_days='".$month_days."' where calendar_month_id='".$month_id."' ";
					}
					else
					{
						$con->insertdb("insert into tbl_calendar_month values(NULL,'".$cat_id."','".$month."','".$month_days."')");

					}
				}	
			}
			
			
				
				
	         header("location: calendarCatView.php?page=$page");

	  }
	  
	if(isset($_POST['addCalendar']))
	{
	     // print_r($_POST);

		 $calendar_name=$_POST['calendar_name'];
        $description=$_POST['description'];
        $meta_tag_title=$_POST['meta_tag_title'];
        $meta_tag_description=$_POST['meta_tag_description'];
        $meta_tag_keywords=$_POST['meta_tag_keywords'];					  		
        $slug=$_POST['slug'];
		 
		$from_date=$_POST['from_date'];
		$to_date=$_POST['to_date'];
		
        $catID = '';
        //get multiple value of radio (multiple categories)
        foreach ($_POST['mulradio'] as $attributeKey => $attributes){
            // echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
            $catID.= $_POST['mulradio'][$attributeKey].",";
        } //foreach
	    $RES = $con->insertdb("INSERT INTO `tbl_calendar` (
						 `calendar_name` ,
						 `description` ,
						 `cat_id`,
						 `meta_tag_title`,
						 `meta_tag_description`,
						 `meta_tag_keywords`,
						 `slug`,
						 `from_date`,
						 `to_date`
						 )
						 VALUES (
						 '".$calendar_name."',
						 '".$description."',  
						 '".$catID."', 
						 '".$meta_tag_title."', 
						 '".$meta_tag_description."', 
						 '".$meta_tag_keywords."', 
						 '".$slug."', 
						 '".$from_date."', 
						 '".$to_date."'
						 );");
				 
    header("location:calendarView.php");
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
			$catImage = createImage('frontimg', "../calendarcategory/");			
				
			// end of single image
			//-------------------------
			
			$con->insertdb("insert into tbl_calendar_category(cat_parent_id,cat_name,cat_image,meta_tag_title, meta_tag_description, meta_tag_keywords,slug) 
            values(".$cat_parent_id.",'".$cat_name."','".$catImage."', '".$meta_tag_title."', '".$meta_tag_description."', '".$meta_tag_keywords."', '".$slug."')");

            $cat_id = $con->getLastInsertId();
            
            //insert in tbl_calendar_month table
            foreach($_POST['month_days'] as $i => $item) 
            {
                // echo 'in';
                if($_POST['month_days'][$i]!='')
                {
                    $month= $_POST['month'][$i];
                    $month_days= $_POST['month_days'][$i];
                    $con->insertdb("insert into tbl_calendar_month values(NULL,'".$cat_id."','".$month."','".$month_days."')");

                    
                }
            }


			header("location: calendarCatView.php?page=$page");
	}
	   
	if(isset($_POST['updateCalendar']))
	{
        $catID ='';
        $calendar_id=$_POST['calendar_id'];
        $calendar_name=$_POST['calendar_name'];
        $slug=$_POST['slug'];
        
        $from_date=$_POST['from_date'];
        $to_date=$_POST['to_date'];
                
        $page = $_POST['page'];
        $meta_tag_title=$_POST['meta_tag_title'];
        $meta_tag_description=$_POST['meta_tag_description'];
        $meta_tag_keywords=$_POST['meta_tag_keywords'];		
        
        // $cat_id=$_POST['cat_id'];
        
        //get multiple value of radio (multiple categories)
        foreach ($_POST['mulradio'] as $attributeKey => $attributes){
            //echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
            $catID.= $_POST['mulradio'][$attributeKey].",";
        } //foreach
	  


	
		

		$con->insertdb("UPDATE `tbl_calendar` SET calendar_name='".$calendar_name."',cat_id='".$catID."',meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',from_date='".$from_date."',to_date='".$to_date."'  where calendar_id='".$calendar_id."'");
	
	  
	  header("location:calendarView.php?page=$page");  
	 }

	
if(isset($_GET["Image"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_calendar_category where cat_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../calendarcategory/'.$row[4]);
	  unlink('../calendarcategory/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_calendar_category set cat_image='' where cat_id = '".$id."'");
	header("location: calendarCategory_up.php?category_id=".$id."&page=".$page);



}	

if(isset($_GET["ProImage"]))
	{
	//print_r($_POST);die;
	$id= $_GET['id'];
	$records=$con->selectdb("SELECT * FROM tbl_calendar where calendar_id=".$id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../calendar/'.$row[4]);
	  unlink('../calendar/big_img/'.$row[4]);

	}
	$con->selectdb("update tbl_calendar set calendar_image='' where calendar_id = '".$id."'");
	header("location: calendar_up.php?calendar_id=".$id."&page=".$page);


}	


//multiple image delete calendar..
if(isset($_REQUEST["btnDeleteImages"]))
{
	$calendar_id = $_POST['calendar_id'];
	$page = $_POST['page'];

	$image = $_POST['frontimg1'];
	$image_list = explode(',',$image);
	$new_image_list = '';
	
	if(isset($_REQUEST["imageEdit"]))
	{
		foreach($_REQUEST['imageEdit'] as $row)
		{
			 $image = str_replace($row.',' , '' ,$image);
			 @unlink('../calendarF/big_img/'.$row);
			 @unlink('../calendarF/'.$row);
		}
		
		$con->selectdb("update tbl_calendar set multi_images='".$image."' where calendar_id = '".$calendar_id."'");
		header("location: calendar_up.php?calendar_id=".$calendar_id."&page=".$page);
	}
	else
	{
		echo 'No Image selected';
	}
		
}

//multiple pdf delete calendar..
 if(isset($_REQUEST["btnDeletepdfs"]))
{
	$calendar_id = $_POST['calendar_id'];
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
		
		$con->selectdb("update tbl_calendar set pdf_file='".$pdf."' where calendar_id = '".$calendar_id."'");
		header("location: calendar_up.php?calendar_id=".$calendar_id."&page=".$page);
	}
	else
	{
		echo 'No pdf selected';
	}
		
}


?>