<?
$page_id = 13;
include_once("header.php");
$sql = $cn->selectdb("select extra_icon from tbl_addmore where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

  <!-- Start main-content -->
  <div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="icon/big_img/<?echo $extra_icon?>">
    <?
    $sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
    $row = $cn->fetchAssoc($sql);
    extract($row);
    ?>
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center"><?echo $page_name ?></h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="./">Home</a></li>
                <li><a href="javascript:void(0)">About Us</a></li>
                <li class="active text-gray-silver"> <?echo $page_name ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About -->
    <section id="about" class="divider parallax layer-overlay overlay-light " data-bg-img="images/bg/metasLogo.jpg">
      <div class="container mt-50 pb-70 pt-0">
        <div class="section-content">
          <div class="row mt-10">
            <div class="col-sm-12 col-md-4 mt-10 wow fadeInDown  pull-right" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="video-popup">                
                <img alt=" <?echo $page_name ?>" src="page/big_img/<?echo $image?>" class="img-responsive   img-fullwidth mt-10 ml-30 ml-xs-0 ml-sm-0">             

                  
              </div>
            </div>
            <div class="col-sm-12 col-md-8 mb-sm-20 wow fadeInUp pull-right" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="my_desc my_desc__about">
                <?echo $page_desc ?>
              </div>
           
             
              <!-- <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-0" href="#">View Details</a>  -->
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

<?php include 'footer.php'; ?>

<!-- <script>
    $("#missionSec .Mcol").each(function(){
        alert($(".Mcol").height());
    });
</script> -->
