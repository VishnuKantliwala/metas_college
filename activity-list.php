<?php 
$page_id='6'; 
// Course id - PID
$acid = urldecode($_GET['acid']);
include 'header.php'; 

$sqlEventCategory =  $cn->selectdb("SELECT cat_id, cat_name FROM tbl_eventcategory where slug = '".$acid."'");
if( $cn->numRows($sqlEventCategory) > 0 )
{
  $rowEventCategory = $cn->fetchAssoc($sqlEventCategory);
  extract($rowEventCategory);
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
                <li><a href="javascript:void(0)">Activities</a></li>                
                <?
                  $cn->getCategories($cat_id, 'tbl_eventcategory', 'tbl_event', "");
                ?>
                <!-- <li class="active text-gray-silver"><?echo $cat_name ?></li> -->
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
 <!-- Section: Teachers -->

    <!-- Section: Upcoming Events -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-light" data-bg-img="images/bg/metasLogo.jpg">
      <div class="container pb-50 pt-80">
        <div class="section-content">
          <div class="row" id="results">
            
            
            
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

  <?
  include_once("footer.php");
  ?>
  <script src="js/scroll.js" id="helper" cat_id="<?echo $cat_id?>" file-name="getactivities.php" limit="20"
    pid="0"  ></script>