<?
$page_id = 37;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
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
                            <?echo $page_name ?> 
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>

                            <li class="active text-gray-silver">
                                <?echo $page_name ?>
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
            <div class="section-title text-center pt-10">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        
                                <a class="btn btn-dark btn-theme-colored btn-xl" href="alumni-registration">Register <i class="fa fa-plus"></i> </a>
                    </div>
                </div>
            </div>
            <div class="row multi-row-clearfix">
                <?
                $sqlAB1 = $cn->selectdb("SELECT alumni_id FROM tbl_alumni WHERE `status`=1 ORDER BY recordListingID LIMIT 1");
                if( $cn->numRows($sqlAB1) > 0 )
                {
                    
                ?>
                <div class="col-md-12">
                    <div class="" data-nav="true" id="results">



                    </div>
                </div>
                <?        
                }
                else
                {
                ?>
                <div class="col-md-12 text-center">
                    <h2>No alumni found.</h2>
                </div>
                <?
                }
                
                ?>
                <div id="loader_image text-center row" style="width:100%;    text-align: center;">
                    <img id="loader_image" src="./images/loader.gif" style="width:30px;" />
                </div>
            </div>
        </div>
    </section>


    <?
    include_once("footer.php");
    ?>
    <script src="js/scroll.js" id="helper" cat_id="0" file-name="getalumni.php" limit="20" pid="0"></script>