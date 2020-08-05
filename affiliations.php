<?
$page_id = 41;
include_once("header.php");

$sql = $cn->selectdb("select image, page_name from tbl_page where page_id =$page_id");
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
                            <li><a href="javascript:void(0)">Addmission</a></li>
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
                <div class="row mt-10">

                    <div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <?
                        $sqlAffiliations = $cn->selectdb("select pdf_file, affiliations_name from tbl_affiliations order by recordListingID");
                        if( $cn->numRows($sqlAffiliations) > 0 )
                        {
                            while($rowAffiliations = $cn->fetchAssoc($sqlAffiliations))
                            {
                                extract($rowAffiliations);
                        ?>
                        <div class="col-md-4 pb-10">
                            <a download style="width:100%" href="affiliations_pdf/<?echo $pdf_file?>" class="btn btn-gray btn-theme-colored btn-circled btn-xl"><?echo $affiliations_name ?> <i class="fa fa-download"></i></a>
                        </div>
                        <?
                            }
                        }
                        else
                        {
                        ?>
                        <div class="col-md-12 text-center">
                            <h3>No record found.</h3>
                        </div>
                        <?
                        }
              
                        ?>
                        

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