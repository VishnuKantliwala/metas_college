<?php 
$page_id='17'; 
// Team id - tid
// $tid = $_GET['tid'];
include 'header.php'; 
$page = $_GET['page'];
$page = trim($page, '/');
$page = $page==0 ? 1 : $page;

$sql = $cn->selectdb("select image, page_name from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);

$sqlApplicationLink = $cn->selectdb('select * from tbl_application_link where application_link_id = 1');
if( $cn->numRows($sqlApplicationLink) > 0 )
{
    $rowApplicationLink = $cn->fetchAssoc($sqlApplicationLink);
    extract($rowApplicationLink);
}
else
{
    $application_link = "";
    $application_link_pdf = "";
}

?>

<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8"
        data-bg-img="page/big_img/<?echo $image?>">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">
                            <?echo $page_name ?>
                        </h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="javascript:void(0)">Admission</a></li>
                            <li class="active text-white">
                                <?echo $page_name ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Blog -->
    <section>
        <div class="container mt-30 mb-10 pt-30 pb-10">
            <div class="row ">
                <div class="col-md-6 text-center div__application_link">
                    <a target="_BLANk" class="btn__application_link" href="<?echo $application_link?>">
                        <i class="pe-7s-note2"></i>&nbsp;
                        Apply Online 
                    </a>
                </div>
                <div class="col-md-6 text-center div__application_link">
                    <a class="btn__application_link" href="download_pdf/<?echo $application_link_pdf?>" target="_BLANK" download>
                        <i class="pe-7s-note2"></i>&nbsp;
                        Quick guide
                    </a>
                </div>
            </div>
        </div>
        <div class="container mt-10 mb-30 pt-10 pb-30">

            <div class="row blog-posts section-title" >
                <div class="col-md-12 text-center ">
                    <h5 class="sub-title top-side-line">our latest</h5>
                    <h2 class="title">News & Updates</h2>
                    
                </div>
                <div class="col-md-12">
                    <!-- Blog Masonry -->
                    <div id="grid" class="gallery-isotope grid-3 masonry gutter-30 clearfix">
                        <?
                        $limit = 20;
                        if($page == 1)
                            $offset = 0;
                        else
                            $offset = $limit * $page - $limit;

                        $sql="SELECT * from tbl_application_blog ORDER BY bdate DESC  LIMIT $limit OFFSET $offset";
                        // echo $sql;
                        $result=$cn->selectdb($sql);
                        if($cn->numRows($result)>0)
                        {
                            $sqlNoOfPages = $cn->selectdb('SELECT application_blog_id from tbl_application_blog');
                            $count = $cn->numRows($sqlNoOfPages);
                            $page_count = ceil($count / $limit);

                            while($row=$cn->fetchAssoc($result))
                            {
                                extract($row);
                                $date = explode(' ',$bdate) [0];
		                        $datee = date("d", strtotime($date));  
                                $month = date("F", strtotime($date));  
                                
                                $href = "application-blog/".urlencode($slug);
                        ?>
                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <a href="<?echo $href?>">
                                            <img src="application_blog/big_img/<?echo $application_blog_image?>" alt="<?echo $application_blog_name ?>" class="img-responsive img-fullwidth">
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600"><?echo $datee ?></li>
                                                <li class="font-12 text-white text-uppercase"><?echo $month ?></li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="<?echo $href?>"><?echo $application_blog_name ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10 my_desc_listing"><?echo substr(strip_tags($description),0,400);?></p>
                                    <a href="<?echo $href?>" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        
                        <?
                            }
                        }
                        else
                        {
                            $page_count = 0;
                        ?>
                        <div class="col-md-12 text-center">
                            <!-- <h5>No records found.</h5> -->
                            <img src="images/no_results_found.png" style="width:50%;margin:20px"/>
                        </div>
                        <?
                        }
                        ?>

                        

                    </div>
                    <!-- Blog Masonry -->
                </div>
            </div>
            <?
            if($page_count > 0)
            {
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        <ul class="pagination xs-pull-center m-0">
                        <?
                        
                        $pn = $page;
                        
                        $totalPages = $page_count;
                        $page = $cn->numRows($result);
                        if ( ($pn > 1)) 
                        {
                        echo "<li><a href='application-for-ug-pg-phd/".($pn-1)."'> < </a></li>"; 
                        }
                        ?>
                        <?
                        if (($pn - 1) > 2) 
                        {
                        echo "<li><a href='application-for-ug-pg-phd/1'> 1 </a></li>"; 
                        echo "<li ><a href='javacript:void(0)'>...</a></li>";
                        }
                        ?>

                        <?
                        for ($i = ($pn - 2); $i <= ($pn + 2); $i ++) 
                        {
                        if ($i < 1)
                            continue;
                        if ($i > $totalPages)
                            break;
                        if ($i == $pn) {
                            $class = "active";
                        } else {
                            $class = " page-a-link";
                        }

                        echo "<li class='".$class."'><a  href='application-for-ug-pg-phd/".$i."'> ".$i." </a></li>";  
                        }
                        ?>

                        <?
                        if (($totalPages - ($pn + 1)) >= 2) 
                        {
                        echo "<li ><a href='javacript:void(0)'>...</a></li>";
                        }
                        ?>

                        <?
                        if (($totalPages - ($pn + 2)) > 0) 
                        {
                            if ($pn == $totalPages) {
                                $class = "active";
                            } else {
                                $class = "page-a-link";
                            }
                            echo "<li><a class='".$class."' href='application-for-ug-pg-phd/".$totalPages."'> ".$totalPages." </a></li>";  
                        }
                        ?>

                        <?
                        if ( ($pn < $totalPages)) 
                        {
                        echo "<li><a href='application-for-ug-pg-phd/".($pn+1)."'> > </a></li>"; 
                        }
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?
            }
            ?>
        </div>
    </section>
</div>
<!-- end main-content -->

<?
include_once("footer.php");
?>