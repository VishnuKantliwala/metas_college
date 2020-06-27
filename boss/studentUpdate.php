<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
include_once("../navigationfun.php");
include_once("../sitemap.php");

include_once('image_lib_rname.php'); 
$con=new connect();
$con->connectdb();
$cn=new connect();
$cn->connectdb();

$pageID= 'page29';

$student_id=$_GET['student_id'];

  
if(isset($_POST['updateSlider']))
{
		
    $student_title = $_POST['student_title'];
    $student_email=mysqli_escape_string($cn->getConnection(),$_POST['student_email']);
    $student_degree=$_POST['student_degree'];
    $student_position=$_POST['student_position'];
    $description = $_POST['description'];
    $student_qualification = $_POST['student_qualification'];
    $student_articles = $_POST['student_articles'];
    $student_presentations = $_POST['student_presentations'];
    $student_invites = $_POST['student_invites'];
    $student_thesis = $_POST['student_thesis'];
    $student_workshops = $_POST['student_workshops'];
    $meta_tag_title=$_POST['meta_tag_title'];
    $meta_tag_description=$_POST['meta_tag_description'];
    $meta_tag_keywords=$_POST['meta_tag_keywords'];	
    $slug = $_POST['slug'];
    //get multiple value of radio (multiple categories)
    $catID = "";
    foreach ($_POST['mulradio'] as $attributeKey => $attributes){
        //echo $attributeKey.' '.$_POST['mulradio'][$attributeKey].'<br>';
            
        $catID.= $_POST['mulradio'][$attributeKey].",";
    } //foreach
    
                    
        
    $frontimg2=$_POST['frontimg2'];
        
    if($_FILES["image_name"]['error']>0)
    
    {
        $sqlFile = "";
    }
    else
    {
        @unlink("../student/big_img/". $frontimg2);
        @unlink("../student/". $frontimg2);
        $sliderImage = createImage('image_name',"../student/");
        
        $sqlFile = ", `image_name` = '".$sliderImage."'";
    }
                
    $con->insertdb("UPDATE `tbl_student` SET `student_title` = '".$student_title."', `description` = '".$description."'  ".$sqlFile.", meta_tag_title='".$meta_tag_title."',meta_tag_description='".$meta_tag_description."',meta_tag_keywords='".$meta_tag_keywords."',slug='".$slug."',cat_id='".$catID."', `student_email` = '".$student_email."', `student_degree` = '".$student_degree."', `student_position` = '".$student_position."', `student_qualification` = '".$student_qualification."', `student_articles` = '".$student_articles."', `student_presentations` = '".$student_presentations."', `student_invites` = '".$student_invites."', `student_email` = '".$student_email."', `student_thesis` = '".$student_thesis."', `student_workshops` = '".$student_workshops."' WHERE `tbl_student`.`student_id` = '".$student_id."'");

	
	header("location: studentView.php?page=$page");
}

if(isset($_GET["Image"]))
	{
	//print_r($_GET);die;
	$page=$_GET['page'];
	$student_id= $_GET['student_id'];
	$records=$con->selectdb("SELECT * FROM tbl_student where student_id=".$student_id."");
	while($row=mysqli_fetch_row($records))
	{
	  unlink('../student/'.$row[1]);
	  unlink('../student/big_img/'.$row[1]);

	}
	$con->selectdb("update tbl_student set image_name='' where student_id = '".$student_id."'");
	header("location: studentUpdate.php?student_id=".$student_id."&page=".$page);


}	

$query = $con->selectdb('SELECT * FROM tbl_team_category');
if(mysqli_num_rows($query)>0)
{
    while ($row = mysqli_fetch_assoc($query))
    {
        $menu_items[$row['cat_id']] = array('cat_name' => $row['cat_name'],'cat_parent_id' => $row['cat_parent_id']);
    }
}
else{
    $menu_items = array();
}


// reterive selected value
$sqlC=$con->selectdb("SELECT cat_id FROM tbl_student where student_id=".$student_id."");
while($rowC=mysqli_fetch_assoc($sqlC))
{
    $arraycat_id= explode(",",$rowC['cat_id']);
}
$finalarray= array_filter($arraycat_id);

// end of selected value



global $menuItems;
global $parentMenuIds;
global $finalarray;
//create an array of parent_menu_ids to search through and find out if the current items have an children
foreach($menu_items as $parentId)
{
    $parentMenuIds[] = $parentId['cat_parent_id'];
}
//assign the menu items to the global array to use in the function
$menuItems = $menu_items;


//recursive function that prints categories as a nested html unorderd list
function generate_menu($parent)
{
        $has_childs = false;
        //this prevents printing 'ul' if we don't have subcategories for this category
        global $menuItems;
        global $parentMenuIds;
        global $finalarray;
        //use global array variable instead of a local variable to lower stack memory requierment
        foreach($menuItems as $key => $value)
        {
            if ($value['cat_parent_id'] == $parent) 
            {    
                //if this is the first child print '<ul>'
                if ($has_childs === false)
                {
                    //don't print '<ul>' multiple times  
                    $has_childs = true;
                    
                    echo '<ul>';
                    
                }
                
                    
                // checked mark in radio button
                    $sel ='';

                if(in_array($key,$finalarray))
                {
                    $sel= 'checked="checked"';
                    }
                //end of checked mark 
                if($value['cat_parent_id'] == 0 && in_array($key, $parentMenuIds))
                {
                    echo '<li data-jstree='.'{"opened":true}'.'><a href="teamcategory.php?id=' . $key . '">' . $value['cat_name'] . '<b class="caret"></b></a>';
                }
                else if($value['cat_parent_id'] != 0 && in_array($key, $parentMenuIds))
                {
                    echo '<li data-jstree='.'{"opened":true}'.'><a href="teamcategory.php?id=' . $key . '">' . $value['cat_name'] . '</a>';
                }
                else
                {
                    echo '<li data-jstree='.'{"opened":true,"type":"file"}'.'>'.
                    '<div style="display: inline!important;" class="custom-control custom-switch">'.
                        '<input type="checkbox" class="custom-control-input" id="customSwitch'.$key.'" name="mulradio[]" value="'.$key.'"  '.$sel.' />'.
                        '<label class="custom-control-label" for="customSwitch'.$key.'">' . $value['cat_name'] .'</label>'.
                    '</div>';
                }
                generate_menu($key);
                
                //call function again to generate nested list for subcategories belonging to this category
                echo '</li>';
            }
        }
        if ($has_childs === true) echo '</ul>';
}			
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Master Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <?$sqlF = $cn->selectdb("select * from tbl_favicon where fav_id= 1 ");
            $rowF = mysqli_fetch_assoc($sqlF);
        ?>
    <link rel="<?echo $rowF['relation'];?>" href="../favicon/big_img/<?echo $rowF['image_name'];?>" />


    <!--Morris Chart-->
    <link rel="stylesheet" href="assets/libs/morris-js/morris.css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css?v=<?echo time();?>" rel="stylesheet" type="text/css" />

    <!-- dropify -->
    <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <?$sqlL = $cn->selectdb("select * from tbl_logo where logo_id= 1 ");
                            $rowL = mysqli_fetch_assoc($sqlL);
                        ?>
                        <img src="<?if($rowL['image_name']!=''){echo " ../logo/big_img/".$rowL['image_name'];}?>" alt=""
                        height="16">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Student</h4>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?include_once("menu.php");?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="mt-0 mb-2 header-title">Student Form</h4>
                                <form class="form-horizontal" method="post" action="#" id="myform" name="myform"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="page" id="page" value="<? echo $_GET['page'];?>">

                                    <?php
										$records=$con->selectdb("SELECT * FROM tbl_student where student_id=".$student_id."");
										while($row=mysqli_fetch_assoc($records))
										{
										?>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Category List</label>
                                        <div class="col-sm-12">
                                            <div class="panel-body">
                                                <div id="basicTree">
                                                    <ul>
                                                        <li data-jstree='{"opened":true}'>Category List
                                                            <?php generate_menu(0);?>
                                                        </li>
                                                    </ul>
                                                    <script>
                                                    menu_initiate();
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Slug" value="<? echo $row['slug']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="student_title" name="student_title"
                                                placeholder="Name" required value="<? echo $row['student_title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Degree</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="student_degree" name="student_degree"
                                                placeholder="Degree" required value="<? echo $row['student_degree']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Position</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="student_position" name="student_position"
                                                placeholder="Position" required value="<? echo $row['student_position']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="student_email" name="student_email"
                                                placeholder="Email" required value="<? echo $row['student_email']; ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="ckeditor" id="description" name="description"
                                                placeholder="Description"><? echo $row['description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail3"
                                                class="col-sm-12 control-label">Qualification</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_qualification"
                                                    name="student_qualification" placeholder="Qualification"><? echo $row['student_qualification']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail3" class="col-sm-12 control-label">Articles in
                                                journals</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_articles"
                                                    name="student_articles" placeholder="Articles in journals"><? echo $row['student_articles']; ?></textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="inputEmail3" class="col-sm-12 control-label">Paper
                                                Presentation</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_presentations"
                                                    name="student_presentations"
                                                    placeholder="Paper Presentation"><? echo $row['student_presentations']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="inputEmail3" class="col-sm-12 control-label">Invited
                                                Talks</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_invites"
                                                    name="student_invites" placeholder="Invited Talks"><? echo $row['student_invites']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="inputEmail3" class="col-sm-12 control-label">MPhil / PhD
                                                thesis</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_thesis" name="student_thesis"
                                                    placeholder="MPhil / PhD thesis"><? echo $row['student_thesis']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="inputEmail3" class="col-sm-12 control-label">Workshop/ FDP/ Training
                                                programme attendeds</label>
                                            <div class="col-sm-12">
                                                <textarea type="text" class="ckeditor" id="student_workshops"
                                                    name="student_workshops"
                                                    placeholder="Workshop/ FDP/ Training programme attendeds"><? echo $row['student_workshops']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Image:</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="image_name" name="image_name" class="dropify"
                                                data-default-file="<?if($row['image_name']!=''){echo "
                                                ../student/".$row['image_name'];}?>"/>

                                            <? if($row['image_name']!=''){?>
                                            <a class="btn btn-lighten-danger"
                                                href="studentUpdate.php?student_id=<?php echo $row['student_id']; ?>&Image=Del"
                                                onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <? } ?>
                                            <input type="hidden" id="frontimg2" name="frontimg2"
                                                value="<?php echo $row['image_name']?>" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"><span
                                                style="color:#F00; font-weight:bold;">*</span> Meta Tag Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="meta_tag_title"
                                                name="meta_tag_title" placeholder="Meta Tag Title"
                                                value="<?php echo $row['meta_tag_title']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Tag
                                            Description</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" class="form-control" id="meta_tag_description"
                                                name="meta_tag_description"
                                                placeholder="Meta Tag Description"><?php echo $row['meta_tag_description']?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Tag
                                            Keywords</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" class="form-control" id="meta_tag_keywords"
                                                name="meta_tag_keywords"
                                                placeholder="Meta Tag Keywords"><?php echo $row['meta_tag_keywords']?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updateSlider" id="updateSlider"
                                                class="btn btn-success">Update</button>
                                            <button type="submit" name="myButton" id="myButton"
                                                class="btn btn-lighten-danger"
                                                onClick="window.location.href='studentView.php'; return false;">Cancel</button>
                                        </div>
                                    </div>

                                    <? } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- dropify js -->
        <script src="assets/libs/dropify/dropify.min.js"></script>

        <!-- form-upload init -->
        <script src="assets/js/pages/form-fileupload.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- ckeditor -->
        <script src="assets/libs/ckeditor/ckeditor.js"></script>

</body>

</html>