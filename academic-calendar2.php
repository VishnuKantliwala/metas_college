<?
$page_id = 50;
include_once("header.php");

$sql = $cn->selectdb("select image, page_name, page_desc from tbl_page where page_id =$page_id");
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
                            <li><a href="javascript:void(0)">R & D</a></li>
                            <li class="active text-gray-silver">
                                <?echo $page_name ?>
                            </li>
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
                <div class="row mt-10" id="results">


                </div>
                <div id="loader_image text-center row" style="width:100%;    text-align: center;">
                    <img id="loader_image" src="./images/loader.gif" style="width:30px;" />
                </div>
            </div>
        </div>
    </section>



    <?php include 'footer.php'; ?>
    <script src="js/scroll.js" id="helper" cat_id="0" file-name="getcalendar.php" limit="5" pid="0"></script>

    <!-- <script>
    $("#missionSec .Mcol").each(function(){
        alert($(".Mcol").height());
    });
</script> -->