<?
$page_id = 36;
$aid = urldecode($_GET['aid']);
include_once("header.php");
// Table event for table activity
$sqlEvent = $cn->selectdb("SELECT * FROM tbl_event where slug = '".$aid."'");
if( $cn->numRows($sqlEvent) > 0 )
{
  $rowEvent = $cn->fetchAssoc($sqlEvent);
  extract($rowEvent);
}
else
{
  echo "<script>window.open('./404','_SELF')</script>";
}

$sql = $cn->selectdb("select image from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);

?>



<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="page/big_img/<?echo $image?>">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28 text-white">
                            <?echo $event_title ?>
                            </h2>
                            <ol class="breadcrumb text-center text-black mt-10">
                                <li><a href="#">Home</a></li>
                                <li><a href="activities">Activities</a></li>
                                <li class="active text-gray-silver">
                                    <?echo $event_title ?>
                                </li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-md-offset-3">
                    <img src="event/big_img/<?echo $image_name?>" alt="<?echo $event_title?>">
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-md-12">
                    <h4 class="mt-0">Event Description</h4>
                    <?echo $description ?>
                </div>

            </div>

        </div>
    </section>


    <?
    if($multi_images != "")
    {
    ?>
    <section>
        <div class="container mt-0 pt-0">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-20">Photo Gallery</h4>
                    <div class="owl-carousel-5col" data-nav="true">
                        <?
                          $imgs=explode(",",$multi_images);
                          for($i=0;$i<count($imgs)-1;$i++)
                          {
                        ?>
                        <div class="item">
                            <a data-rel="prettyPhoto" href="eventF/big_img/<? echo $imgs[$i];?>">
                                <img src="eventF/big_img/<? echo $imgs[$i];?>" alt="<?echo $event_title?>"
                                    class="gallery-slider-img">
                            </a>
                        </div>

                        <?
                          }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
    }
    ?>
    <?
    if($pdf_file!="")
    {
    ?>
    <section>
        <div class="container mt-0 pt-0">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-20">Pdf file</h4>
                    
                        <div class="col-md-4 pb-10">
                            <a download style="width:100%" href="event_pdf/<?echo $pdf_file?>" class="btn btn-gray btn-theme-colored btn-circled btn-xl"><?echo $event_title ?> <i class="fa fa-download"></i></a>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?
    }
    ?>
</div>
<!-- end main-content -->

<?
  include_once("footer.php");
  ?>