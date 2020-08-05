<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:Login.php");
}

include_once("../connect.php");
$con=new connect();
$con->connectdb();
$cn=new connect();
$cn->connectdb();

$category_id=$_GET['category_id'];
$pageID= 'page20';

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
$sqlMonths = $cn->selectdb("select * from tbl_calendar_month where cat_id =".$_GET['category_id']);

?>
    <script>
    var addMonthCount = <? echo $cn-> numRows($sqlMonths) ?> ;
    // alert(addSupplierContactCount);
    function addMonth() {
        addMonthCount++;



        $("#month-list").append('<div class="form-group row" id="month' + addMonthCount +
            '"><label class="col-sm-3  col-form-label" for="month">Month ' + addMonthCount +
            '</label><div class="col-sm-3"><select name="month[]" class="form-control"><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="August">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select></div><div class="col-sm-3"><input type="text" name="month_days[]" class="form-control" placeholder="Working Days"></div><div class="col-sm-3 form-group"><input type="button" class="btn btn-danger" value=" REMOVE   " onclick="removeMonth(' +
            addMonthCount +
            ')"></div><br /></div>');


    }


    function removeMonth(removeId) {

        if (addMonthCount > 0) {
            addMonthCount--;

            $("#month" + removeId).remove();
        }
    }
    </script>
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
                    <h4 class="page-title-main">Calendar Category</h4>
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
                                <h4 class="mt-0 mb-2 header-title">Calendar Category Form</h4>
                                <form class="form-horizontal" method="post" action="calendar_upload.php" id="myform"
                                    name="myform" enctype="multipart/form-data">
                                    <?php
                    
                                    $records=$con->selectdb("SELECT * FROM tbl_calendar_category  where cat_id=".$category_id."");
                    
                                    while($row=mysqli_fetch_row($records))
                                    {
                                    ?>
                                    <input type="hidden" name="page" id="page" value="<? echo $_GET['page'];?>">
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $row[0]; ?>" />
                                    <input type="hidden" id="cat_parent_id" name="cat_parent_id"
                                        value="<?php echo $row[1]; ?>" />



                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Slug</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Slug" value="<?php echo $row[9]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Category Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="cat_name" name="cat_name"
                                                placeholder="Category Name" value="<?php echo $row[2]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="frontimg" name="frontimg" class="dropify"
                                                data-default-file="<? if($row[4]!=''){echo "
                                                ../calendarcategory/".$row[4];}?>"/>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="hidden" id="frontimg2" name="frontimg2"
                                                value="<?php echo $row[4]?>" />
                                            <?php if($row[4]!=''){?>
                                            <a class="btn btn-lighten-danger"
                                                href="calendar_upload.php?id=<?php echo $row[0]; ?>&Image=Del"
                                                onClick="return confirm('Are you sure want to delete?');">Delete</a>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label"><span
                                                style="color:#F00; font-weight:bold;">*</span> Meta Tag Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="meta_tag_title"
                                                name="meta_tag_title" placeholder="Meta Tag Title"
                                                value="<?php echo $row[5]?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag
                                            Description</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_description"
                                                name="meta_tag_description"
                                                placeholder="Meta Tag Description"><?php echo $row[6]?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-12 control-label">Meta Tag
                                            Keywords</label>
                                        <div class="col-sm-12">
                                            <textarea cols="5" rows="5" class="form-control" id="meta_tag_keywords"
                                                name="meta_tag_keywords"
                                                placeholder="Meta Tag Keywords"><?php echo $row[7]?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <h4>Months working days</h4>
                                            <br />
                                        </div>
                                        <div class="month-list" id="month-list">
                                            <?
                                            $sqlMonths = $cn->selectdb("select * from tbl_calendar_month where cat_id =".$_GET['category_id']);
                                            if( $cn->numRows($sqlMonths) > 0 )
                                            {
                                                $i=0;
                                                while($rowMonths = $cn->fetchAssoc($sqlMonths))
                                                {
                                                    $i++;
                                            ?>
                                            <div class="form-group row" id="month<?echo $i?>">
                                                <label class="col-sm-3  col-form-label" for="month">Month <?echo $i?>
                                                </label>
                                                <div class="col-sm-3">
                                                    <select name="month[]" class="form-control">
                                                        <option <?if($rowMonths['month'] == 'January'){ echo "selected";} ?> value="January">January</option>
                                                        <option <?if($rowMonths['month'] == 'February'){ echo "selected";} ?> value="February">February</option>
                                                        <option <?if($rowMonths['month'] == 'March'){ echo "selected";} ?> value="March">March</option>
                                                        <option <?if($rowMonths['month'] == 'April'){ echo "selected";} ?> value="April">April</option>
                                                        <option <?if($rowMonths['month'] == 'May'){ echo "selected";} ?> value="May">May</option>
                                                        <option <?if($rowMonths['month'] == 'June'){ echo "selected";} ?> value="June">June</option>
                                                        <option <?if($rowMonths['month'] == 'July'){ echo "selected";} ?> value="July">July</option>
                                                        <option <?if($rowMonths['month'] == 'August'){ echo "selected";} ?> value="August">August</option>
                                                        <option <?if($rowMonths['month'] == 'September'){ echo "selected";} ?> value="August">September</option>
                                                        <option <?if($rowMonths['month'] == 'October'){ echo "selected";} ?> value="October">October</option>
                                                        <option <?if($rowMonths['month'] == 'November'){ echo "selected";} ?> value="November">November</option>
                                                        <option <?if($rowMonths['month'] == 'December'){ echo "selected";} ?> value="December">December</option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="hidden" name="month_id[]" value="<?echo $rowMonths['calendar_month_id']?>" />
                                                    <input value="<?echo $rowMonths['month_days']?>" type="text" name="month_days[]" class="form-control"
                                                        placeholder="Working Days">
                                                </div>


                                                <div class="col-sm-3 form-group">
                                                    <input type="button" class="btn btn-danger" value=" REMOVE   "
                                                        onclick="removeMonth(<?echo $i?>)">

                                                </div>
                                                <br />
                                            </div>
                                            <?
                                                }
                                            }
                                            ?>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-4 text-left">

                                                <button type="button" onClick="addMonth()" class="btn btn-success">ADD
                                                    MORE</button>

                                            </div>
                                        </div>


                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updateCategory" id="updateCategory"
                                                class="btn btn-success">Update</button>
                                            <button type="submit" name="myButton" id="myButton"
                                                class="btn btn-lighten-danger"
                                                onClick="window.location.href='calendarCatView.php'; return false;">Cancel</button>
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