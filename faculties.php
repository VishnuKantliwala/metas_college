<?php 
$page_id='6'; 
// Course id - PID
$tcid = $_GET['tcid'];
include 'header.php'; 

$sqlFacultyCategory =  $cn->selectdb("SELECT cat_id, cat_name FROM tbl_team_category where slug = '".$tcid."'");
if( $cn->numRows($sqlFacultyCategory) > 0 )
{
  $rowFacultyCategory = $cn->fetchAssoc($sqlFacultyCategory);
  extract($rowFacultyCategory);
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
              <h2 class="title text-white text-center"><?echo $cat_name ?></h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./">Home</a></li>
                <li><a href="javascript:void(0)">Faculties</a></li>                
                <?
                  $cn->getCategories($cat_id, 'tbl_team_category', 'tbl_team', "");
                ?>
                <!-- <li class="active text-gray-silver"><?echo $cat_name ?></li> -->
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
 <!-- Section: Teachers -->
 <section>
      <div class="container pb-50">
        
        <div class="row multi-row-clearfix results" id="results">
          
          
        </div>
        <div id="loader_image text-center row" style="width:100%;    text-align: center;">
          <img id="loader_image" src="./images/loader.gif" style="width:30px;" />
      </div>
      </div>
    </section>


    </div>




<?php include 'footer.php'; ?>
<script src="js/scroll.js" id="helper" cat_id="<?echo $cat_id?>" file-name="getfaculties.php" limit="20"
    pid="0"  ></script>