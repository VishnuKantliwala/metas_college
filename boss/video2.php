<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}
include_once("../connect.php");

$cn=new connect();
$cn->connectdb();
$pageID= 'page29';

$auto_code = 0;

include_once("../connect.php");
include_once("image_lib_rname.php");
$con=new connect();
$con->connectdb();
    $error = "";

    if(isset($_POST['updateVideo']))
    {	    
	  //print_r($_POST);die;
       
        $frontimgvideo2=$_POST['frontimgvideo2'];

        if($_FILES["download_file"]['type'] != 'video/mp4')
        {
            $error = "Please enter a mp4 video file.";
        }
        else
        {
            @unlink("../home_video/". $frontimgvideo2);

            $video_file = createVIDEO('download_file',"../home_video/");

            $con->insertdb("UPDATE `tbl_video2` SET video_file='".$video_file."' where video_id =  1");
        }

			
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
                            <img src="<?if($rowL['image_name']!=''){echo "../logo/big_img/".$rowL['image_name'];}?>" alt="" height="16">
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
                    <h4 class="page-title-main">Home Video</h4>
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
                                <?
                                $sqlVideo = $cn->selectdb("select * from tbl_video2 where video_id = 1");
                                if( $cn->numRows($sqlVideo) > 0 )
                                {
                                    $rowVideo = $cn->fetchAssoc($sqlVideo);
                                    extract($rowVideo);
                                }
                                ?>
                                <h4 class="mt-0 mb-2 header-title">Home Video Form</h4>
                                <form action="" class="form-horizontal" method="post"  id="myform" name="myform" enctype="multipart/form-data">				
									   
                                    <div class="form-group" >
                                        <span style="color:red" id="error"><?echo $error?></span>

                                    </div>

                                    
                                                    
                                    

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Video File [Please select 15 seconds video for better results]</label>
                                        <input type="hidden" class="form-control" id="frontvideo" name="frontvideo" placeholder="Video  " value="<? echo $rowVideo['video_file']; ?>">
                                        <div class="col-sm-12">
                                            <input type="file" id="download_file" name="download_file" class="dropify"  />
                                            <div class="attached-files mt-4">
                                                <div class="task-tags mt-2">
                                                    <?
                                                    
                                                    $video = $rowVideo['video_file'];
                                                        
                                                        if($video!="" || $video!=NULL)
                                                        {
                                                    ?>
                                                    <h5>Current Video</h5>
                                                    <?
                                                        echo $video;
                                                    ?>
                                                    <?
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <input type="hidden" id="frontimgvideo2" name="frontimgvideo2" value="<?php echo $rowVideo['video_file']?>" />
                                        </div>
                                    </div>
                                    
                                    
                                                
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updateVideo" id="updateVideo" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                    
                                    
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

    <!-- App js -->
    <script src="assets/js/video.js"></script>


    </body>

</html>