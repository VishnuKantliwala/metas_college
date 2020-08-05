<?php $page_id='33'; include 'header.php'; ?>
<?php
  $sql="SELECT page_name,image FROM tbl_page WHERE page_id=$page_id";
  $result=$cn->selectdb($sql);
  if($cn->numRows($result)>0){
    $row=$cn->fetchAssoc($result);
  }else{
    echo "<script>window.open('./404','_SELF')</script>";
  }
?>
 <!-- Start main-content -->
 <div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="page/big_img/<?php echo $row['image'];?>">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center"><?php echo $row['page_name'];?></h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="">Home</a></li>
                <li><a href="students-corner">Student Corner</a></li>
                <li class="active text-gray-silver"><?php echo $row['page_name'];?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
  $sql="SELECT title,small_desc,extra_desc FROM tbl_addmore WHERE page_id=$page_id";
  $result=$cn->selectdb($sql);
  if($cn->numRows($result)>0){
    $row=$cn->fetchAssoc($result);
?>
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333"><?php echo $row['title'];?></h2>
              <?php echo $row['small_desc'];?>
            </div>
          </div>
        </div>
        <div class="row secDesc">
          <div class="col-md-12">
            <?php echo $row['extra_desc'];?>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>
  </div>
  <!-- end main-content -->
<?php include 'footer.php' ?>

<script>
  $(document).ready(function() {
    $(".secDesc h5").addClass("text-uppercase mt-0");
    $(".secDesc ul").addClass("list-icon rounded");
    $(".secDesc ul li").prepend('<i class="fa fa-arrow-right"></i>');
    $(".secDesc ul li span").css({"font-weight":"550"});
  });
</script>