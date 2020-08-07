<?
$page_id = 65;
if(!isset($_GET['gcid']))
{
    $gcid = 0;
}
else
{
    $gcid = urldecode($_GET['gcid']);
}
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<?
$sqlGalleryCat = $cn->selectdb("select cat_name, cat_id from tbl_gallery_category where slug like '%".$gcid."%'" );
if( $cn->numRows($sqlGalleryCat) > 0 )
{
    $rowGalleryCat = $cn->fetchAssoc($sqlGalleryCat);
    extract($rowGalleryCat);
    // echo $cat_id;
}
else
{
    $cat_id = 0;
    $cat_name = "Gallery";
}
?>


<!-- Start main-content -->
<div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="page/big_img/<?echo $image?>">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white text-center">
                            <?echo $cat_name ?>
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="javascript:void(0)">Media</a></li>

                            <li class="active text-gray-silver">
                                <?echo $cat_name ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Teachers -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-light"
        data-bg-img="images/bg/metasLogo.jpg">
        <div class="container pb-50 pt-20">
            
            <div class="row multi-row-clearfix">
                <div class="col-md-12">
                    <div class="" data-nav="true" id="results">



                    </div>
                </div>
               
                <div id="loader_image text-center row" style="width:100%;    text-align: center;">
                    <img id="loader_image" src="./images/loader.gif" style="width:30px;" />
                </div>
            </div>
        </div>
    </section>


    <?
    include_once("footer.php");
    ?>
    
    <script src="js/scroll.js" id="helper" cat_id="<?echo $cat_id?>" file-name="getgallerycategory.php" limit="12" pid="0"></script>