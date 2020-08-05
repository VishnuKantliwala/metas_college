<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}
include_once("../connect.php");
$cn=new connect();
$cn->connectdb();
$pageID= 'page21';


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


        <!-- dropify -->
        <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- Treeview css -->
        <link href="assets/libs/treeview/style.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css?v=<?echo time();?>" rel="stylesheet" type="text/css" />
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
                    <h4 class="page-title-main">Alumni</h4>
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
                                <h4 class="mt-0 header-title">Alumni Form</h4>
                                <form class="form-horizontal" method="post" action="alumni_upload.php" id="myform" name="myform" enctype="multipart/form-data">
                                    

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alumni_fname" name="alumni_fname" placeholder="First Name">
                                        </div>
                                    </div>	

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alumni_lname" name="alumni_lname" placeholder="Last Name">
                                        </div>
                                    </div>	

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-3">
                                                <input type="radio"  value="male" name="gender"/> Male
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="radio" value="female" name="gender"/> Female
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="radio" value="other" name="gender"/> Other
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nationality</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" id="country" name="country" >
                                                <?
                                                $sqlCountries = $cn->selectdb("SELECT countryname from country order by countryname");
                                                if( $cn->numRows($sqlCountries) > 0 )
                                                {
                                                    while($rowCountries = $cn->fetchAssoc($sqlCountries))
                                                    {
                                                ?>
                                                <option 
                                                    <?
                                                    if( $rowCountries['countryname'] =='India' ) 
                                                    {
                                                    ?> selected <?
                                                    }
                                                    ?>
                                                    value="<?echo $rowCountries['countryname'] ?>"><?echo $rowCountries['countryname'] ?></option>
                                                <?
                                                    }
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>	

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Image (1 : 1)</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="frontimg" name="frontimg" class="dropify" />
                                        </div>
                                    </div>


                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Birth Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="bdate" name="bdate" placeholder="Birth Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Marital Status</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="marital_status" name="marital_status" placeholder="Marital Status">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Course</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Course">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Year of completion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="year_of_completion" name="year_of_completion" placeholder="Year of completion">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Current Position</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="current_position" name="current_position" placeholder="Current Position">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"><span style="color:#F00; font-weight:bold;">*</span> Meta Tag Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="meta_tag_title" name="meta_tag_title" placeholder="Meta Tag Title" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Tag Description</label>
                                        <div class="col-sm-10">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_description" name="meta_tag_description" placeholder="Meta Tag Description" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Tag Keywords</label>
                                        <div class="col-sm-10">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_keywords" name="meta_tag_keywords" placeholder="Meta Tag Keywords"></textarea>
                                        </div>
                                    </div>
                                                
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="addProduct" id="addProduct" class="btn btn-success">Add</button>
                                            <button type="submit" name="myButton" id="myButton" class="btn btn-lighten-danger" onClick="window.location.href='alumniView.php'; return false;" >Cancel</button>
                                        </div>
                                    </div>
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
    
    <!-- ckeditor -->
    <script src="assets/libs/ckeditor/ckeditor.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    
    <!-- Init js-->
    <script src="assets/js/pages/form-advanced.init.js"></script>
    
    <!-- Tree view js -->
    <script src="assets/libs/treeview/jstree.min.js?v=<?echo time();?>"></script>
    <script src="assets/js/pages/treeview.init.js?v=<?echo time();?>"></script>
    

</body>

</html>