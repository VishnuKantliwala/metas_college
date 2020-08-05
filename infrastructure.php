<?php $page_id=19;$ifid = $_GET['ifid']; include 'header.php'; ?> 

<?php
  $sql="SELECT page_id,page_name,image,multi_images,page_desc FROM tbl_page WHERE slug='$ifid'";
  $result=$cn->selectdb($sql);
  if($cn->numRows($result)>0){
    $rowIn = $cn->fetchAssoc($result);
  }else{
    echo "<script>window.open('./404','_SELF')</script>";
  }
?>
<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="page/big_img/<?php echo $rowIn['image'];?>">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28 text-white"><?php echo $rowIn['page_name'];?></h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="">Home</a></li>
                <li><a href="#">Infrastructure</a></li>
                <li class="active text-gray-silver"><?php echo $rowIn['page_name'];?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          <div class="sidebar sidebar-left mt-sm-30 ml-40">
              <div class="widget">
                <h4 class="widget-title line-bottom">Infrastructure</h4>
                <div class="services-list">
                  <ul class="list list-border angle-double-right">
                  <?php
                    $sql="SELECT page_name,slug FROM tbl_page WHERE page_parent_id=19 LIMIT 9";
                    $result=$cn->selectdb($sql);
                    if($cn->numRows($result)>0){
                      while($row=$cn->fetchAssoc($result)){
                  ?> 
                   <li <?php if($ifid==$row['slug']) echo 'class="active"';?>><a href="infrastructure/<?php echo $row['slug'];?>"><i class="fa fa-angle-right"></i> <?php echo $row['page_name'];?></a></li>
                  <?php
                      }
                    }
                  ?>
                  </ul>
                </div>
              </div>
            </div>    
          </div>
          <div class="col-md-8">
            <div class="owl-carousel-1col" data-nav="true">
            <?php
              $imgs=explode(",",$rowIn['multi_images']);
              array_pop($imgs);
              for ($i=0; $i < count($imgs); $i++) { 
            ?>
              <div class="item"><img src="pageF/big_img/<?php echo $imgs[$i];?>" alt=""></div>
            <?php
              }
            ?>
            </div>
          </div>
        </div>
        <div class="row mt-60">
        <div class="title-separator mb-60">
  <span class="text-uppercase font-26"> <?php echo $rowIn['page_name'];?></span>
</div>
<?php echo $rowIn['page_desc'];?>
<div class="separator"></div>
         
        </div>
      </div>
    </section>



<?php include 'footer.php'; ?>