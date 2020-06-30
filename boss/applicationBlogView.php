<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
include_once("../navigationfun.php");
include_once("imagefunction.php");
include_once("image_lib.php");
require('./Classes/PHPExcel.php');
$cn=new connect();
$cn->connectdb();

$pageID= 'page9';

$sql = $cn->selectdb("SELECT * FROM tbl_application_blog order by application_blog_id desc");

?>
<?php


function deleteapplication_blog($id){

    $cn=new connect();
    $cn->connectdb();
    $sql=  $cn->selectdb("select * from tbl_application_blog where application_blog_id=$id");
	while($row = mysqli_fetch_row($sql))
	{
		//image
		@unlink('../application_blog/big_img/'.$row[4]);
		@unlink('../application_blog/'.$row[4]);
		//end of image
		
		// // pdf
		// @unlink('../download_pdf/'.$row[8]);
		
		// //multiple images
		// $image_list = explode(',',$row[13]);

		// foreach($image_list as $rowF)
		// {
		// 	//print_r($image_list);die;
		// 	$new_image_list = '';
		// 	@unlink('../application_blogF/big_img/'.$rowF);
		// 	@unlink('../application_blogF/'.$rowF);
		// }
		
		
		
	}

	$cn->selectdb("delete from tbl_application_blog where application_blog_id=$id");

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


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css?v=<?echo time();?>" rel="stylesheet" type="text/css" />

        <!-- third party css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

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
                    <h4 class="page-title-main">Blog</h4>
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
                                <h4 class="mt-0 header-title">Blog View</h4>
                                <?php
                                    if(isset($_POST['delete']))
                                    {
                                    $cnt=array();
                                    $cnt=count($_POST['chkbox']);
                                    for($i=0;$i<$cnt;$i++)
                                    {
                                        $del_id=$_POST['chkbox'][$i];
                                        deleteapplication_blog($del_id);
                                    }
                                        echo "<script>window.open('applicationBlogView.php','_SELF')</script>";
                                    }
                                ?>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="application_blog.php" class="btn btn-success m-b-sm mt-2 mb-2">Add</a>
                                            <a href="sorting_application_blog.php" class="btn btn-success m-b-sm mt-2 mb-2">Sort</a>
                                            <input type="submit" class="btn btn-danger m-b-sm mt-2 mb-2"name="delete" value="delete"/>
                                            <a href="application_link.php" class="btn btn-success m-b-sm mt-2 mb-2">Apply online link and Quick guide</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkall" class="checkall" name="sample"/> Select all</th>
                                            <th>Name</th>
                                            <!-- <th>Category</th> -->
                                            <th>Copy</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><input type="checkbox" id="checkall" class="checkall" name="sample"/> Select all</th>
                                            <th>Name</th>
                                            <!-- <th>Category</th> -->
                                            <th>Copy</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($sql) > 0) 
                                            {
                                            $i = 0;
                                                while($row = mysqli_fetch_assoc($sql)) 
                                                {
                                                    extract($row);
                                                    $catID= explode(",",$cat_id);
                                                    //print_r($catID);
                                                    $cnt  =sizeof($catID)-1; 
                                                    //echo $cnt;
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="chkbox[]" id="chkbox" class="chkbox"  value="<?echo $application_blog_id?>"/></td>
												<td><?php echo $application_blog_name ?></td>
												
                                                <td>
												    <a href='application_blog_copy.php?id=<?php echo $application_blog_id ?>&page=<? echo isset($_GET['page']);?>'><i class="fa fa-copy"></i></a>
                                                </td>
                                                <td><a href='application_blog_up.php?application_blog_id=<?php echo $application_blog_id ?>&page=<? echo isset($_GET['page']);?>'><i class="fa fa-edit"></i></a></td>
												<td><a href='delete_application_blog_rec.php?tablename=tbl_application_blog&primarykey=application_blog_id&id=<?php echo $application_blog_id ?>&page=<? echo isset($_GET['page']);?>' onClick="return confirm('Are you sure want to delete?');"><i class="fa fa-trash"></i></a></td>
                                                
                                            </tr>
											<? } } ?>
											<input type="hidden" name="page" id="page" value="<? echo isset($_GET['page']);?>">

                                            
                                        </tbody>
                                    </table>
                                            
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

    <!-- third party js -->
    <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables/dataTables.bootstrap4.js"></script>
    <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables/buttons.print.min.js"></script>
    <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables/dataTables.select.min.js"></script>
    <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js?v=<?echo time();?>"></script>
</body>

</html>