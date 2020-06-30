<?php
ob_start();
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
include_once("../navigationfun.php");
include_once("../sitemap.php");
include_once("./image_lib_rname.php");
$con=new connect();
$con->connectdb();
$cn=new connect();
$cn->connectdb();

$pageID= 'page2';

$application_link_id=1;

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
<?

if(isset($_GET["btnDeletepdf"]))
{
    //print_r($_POST);die;
    $id= $_GET['id'];
    $records=$con->selectdb("SELECT * FROM tbl_application_link where application_link_id=1");
    while($row=mysqli_fetch_row($records))
    {
        unlink('../download_pdf/'.$row['application_link_pdf']);
    }
    $con->selectdb("update tbl_application_link set application_link_pdf='' where application_link_id = '".$id."'");
    header("location: application_link.php");
}	
if(isset($_POST['editbtn']))
{
    $application_link=$_POST['application_link'];
    $frontimgpdf2=$_POST['frontimgpdf2'];
    if($_FILES["download_file"]["name"]=="")
    {
    
        $con->insertdb("UPDATE `tbl_application_link` SET application_link='".$application_link."'  where application_link_id=1");
    }
    else
    {
    
        @unlink("../download_pdf/". $frontimgpdf2);

        $pdf_file = createPDF('download_file',"../download_pdf/");

        $con->insertdb("UPDATE `tbl_application_link` SET application_link='".$application_link."', application_link_pdf='".$pdf_file."'   where application_link_id=1");
    
    }
	
	header("location: application_link.php");
}
?>
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
                        <img src="<?if($rowL['image_name']!=''){echo "
                            ../logo/big_img/".$rowL['image_name'];}?>" alt="" height="16">
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
                    <h4 class="page-title-main">Logo</h4>
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
                                <h4 class="mt-0 header-title">Logo Form</h4>
                                <form class="form-horizontal" method="post" 
                                    id="myform" name="myform" enctype="multipart/form-data">
                                    <?php
									$records=$con->selectdb("SELECT * FROM tbl_application_link where application_link_id=".$application_link_id."");
									while($row=mysqli_fetch_assoc($records))
									{
									?>
                                    <input id="application_link_id" name="application_link_id" type="hidden"
                                        value="<?php echo $row[0]; ?>" />
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Video Link</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="application_link" name="application_link" rows="10"
                                                placeholder="Embeded link from youtube."><?php echo $row['application_link']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">PDF File</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="download_file" name="download_file"
                                                class="dropify" />
                                            <div class="bootstrap-tagsinput">
                                                <span class="tag label label-info bg-light">
                                                    <label class="">
                                                        <?echo $row['application_link_pdf'];?></label>
                                                </span>
                                            </div>
                                            <? if($row['application_link_pdf']!=''){?>
                                            <a href="application_link.php?btnDeletepdf=Del"
                                                class="btn btn-lighten-danger"
                                                onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <? } ?>
                                        </div>
                                        <input type="hidden" id="frontimgpdf2" name="frontimgpdf2"
                                            value="<?php echo $row['application_link_pdf'];?>" />
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="editbtn" id="editbtn"
                                                class="btn btn-success">Update</button>
                                            <button type="submit" name="myButton" id="myButton"
                                                class="btn btn-lighten-danger"
                                                onClick="window.location.href='applicationBlogView.php'; return false;">Cancel</button>
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

    </div><!-- End page -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- dropify js -->
    <script src="assets/libs/dropify/dropify.min.js"></script>

    <!-- form-upload init -->
    <script src="assets/js/pages/form-fileupload.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>