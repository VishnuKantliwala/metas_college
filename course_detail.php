<?php 
$page_id='5'; 
// Course id - PID
$pid = $_GET['pid'];
include 'header.php'; 
$sqlCourse = $cn->selectdb("SELECT * FROM tbl_product where slug = '".$pid."'");
if( $cn->numRows($sqlCourse) > 0 )
{
  $rowCourse = $cn->fetchAssoc($sqlCourse);
  extract($rowCourse);
}
else
{
  echo "<script>window.open('./404','_SELF')</script>";
}
?>

<?
$sql = $cn->selectdb("select image from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?> 



<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="page/big_img/<?echo $image?>">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white text-center">
                            <?echo $product_name ?>
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="javascript:void(0)">Programs</a></li>
                            <?
                              $cn->getCategories($cat_id, 'tbl_category', 'tbl_product', "courses/");
                            ?>
                            <li class="active text-gray-silver"> <?echo $product_name ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Blog -->
    <section>
        <div class="container mt-30 mb-0 pt-30 pb-30">
            <div class="row">
                <div class="col-md-8 blog-pull-right">
                    <div class="single-service">
                        <img src="product/big_img/<?echo $product_image?>" alt="<?echo $product_name?>"
                            style="width:100%">
                        <h3 class="text-theme-colored">
                            <?echo $product_name ?>
                        </h3>
                        <ul id="myTab" class="nav nav-tabs boot-tabs">
                            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                            

                            <?
                            if(strip_tags($course_admission_process) != '')
                            {
                            ?>
                            <li ><a href="#course_admission_process" data-toggle="tab">Admission process</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($course_application_process	) != '')
                            {
                            ?>
                            <li ><a href="#course_application_process" data-toggle="tab">Application process</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($course_e_and_s_process) != '')
                            {
                            ?>
                            <li ><a href="#course_e_and_s_process" data-toggle="tab">Eligibility and Selection Process</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($pdf_file	) != '')
                            {
                            ?>
                            <li ><a href="download_pdf/<?echo trim($pdf_file, ',')?>" download>Syllabus</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($course_faculty_profile_link	) != '')
                            {
                            ?>
                            <li ><a href="<? echo $course_faculty_profile_link; ?>" >Faculty profile</a></li>
                            <?
                            }
                            ?>

                            

                            
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active my_desc" id="overview">
                                <?echo $description ?>
                            </div>
                            <?
                            if(strip_tags($course_admission_process) != '')
                            {
                            ?>
                            <div class="tab-pane fade my_desc" id="course_admission_process">
                                <?echo $course_admission_process ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($course_application_process) != '')
                            {
                            ?>
                            <div class="tab-pane fade my_desc" id="course_application_process">
                                <?echo $course_application_process ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($course_e_and_s_process) != '')
                            {
                            ?>
                            <div class="tab-pane fade my_desc" id="course_e_and_s_process">
                                <?echo $course_e_and_s_process ?>
                            </div>
                            <?
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                            <h4 class="widget-title line-bottom">Courses</h4>
                            <div class="services-list">
                                <ul class="list list-border angle-double-right">
                                    <?
                                    $sqlCat = $cn->selectdb("SELECT cat_name, cat_id from tbl_category where cat_id in ('".trim($cat_id,',')."')");
                                    if( $cn->numRows($sqlCat) > 0 )
                                    {
                                      $rowCat = $cn->fetchAssoc($sqlCat);
                                      $sqlCourses = $cn->selectdb("SELECT product_name,slug, product_id from tbl_product where cat_id like '%".$cat_id."%' order by product_name");
                                      
                                      if( $cn->numRows($sqlCourses) > 0 )
                                      {
                                        
                                      
                                      ?>
                                      <li class="active"><a href="javascript:void(0)"><?echo $rowCat['cat_name'] ?></a></li>  
                                      <?
                                      while( $rowCourses = $cn->fetchAssoc($sqlCourses) )
                                      {
                                        extract($rowCourses);
                                      ?>
                                      <li <?if($product_id == $rowCourse['product_id']) {?>class="my-active-course" <?}?>><i class="fa fa-angle-right"></i><a href="course/<?echo $slug?>"> <?echo $product_name ?></a></li>
                                      <?
                                      }
                                      ?>
                                      <?
                                      }
                                    }
                                    ?>

                                    <?
                                      $sqlCategories = $cn->selectdb("select cat_id, cat_name, slug from tbl_category where cat_id !=  '".$rowCat['cat_id']."' order by cat_name");
                                      if( $cn->numRows($sqlCategories) > 0 )
                                      {
                                    ?>
                                    <?
                                        while($rowCategories = $cn->fetchAssoc($sqlCategories))
                                        {
                                          extract($rowCategories);

                                          $sqlProducts = $cn->selectdb("select product_name, slug from tbl_product where cat_id like '%".$cat_id.",%' order by product_name");
                                          if( $cn->numRows($sqlProducts) > 0 )
                                          {
                                        ?>  
                                        <li class="active"><a href="javascript:void(0)"><?echo $cat_name ?></a></li>
                                        <?
                                            while($rowProducts = $cn->fetchAssoc($sqlProducts))
                                            {
                                              extract($rowProducts);
                                              ?>
                                              <li><i class="fa fa-angle-right"></i><a href="course/<?echo $slug?>"> <?echo $product_name; ?></a></li>               
                                              <?
                                            }
                                          }

                                        }

                                        ?>
                                    <?
                                      }
                                    ?>

                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->

<?php include 'footer.php'; ?>