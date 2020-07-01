<?php 
$page_id='17'; 
// Blog id - bid
$bid = urldecode($_GET['bid']);
include 'header.php'; 

$sql = $cn->selectdb("select image, page_name from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);

$sqlApplicationLink = $cn->selectdb("select * from tbl_application_blog where slug = '".$bid."' ");
if( $cn->numRows($sqlApplicationLink) > 0 )
{
    $rowApplicationLink = $cn->fetchAssoc($sqlApplicationLink);
    extract($rowApplicationLink);

    $date = explode(' ',$bdate) [0];
    $datee = date("d", strtotime($date));  
    $month = date("F", strtotime($date));  
}
else
{
   echo "<script>window.open('./404','_SELF');</script>";
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
                            <?echo $application_blog_name ?>
                        </h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="javascript:void(0)">Admission</a></li>
                            <li><a href="application-for-ug-pg-phd">Application for UG / PG / PHD</a></li>
                            <li class="active text-white">
                                <?echo $application_blog_name ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Blog -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-9 pull-right flip sm-pull-none">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb"> <img
                                        src="application_blog/big_img/<?echo $application_blog_image?>"
                                        alt="<?echo $application_blog_name ?>" class="img-responsive img-fullwidth">
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                    <div
                                        class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">
                                                <?echo $datee ?>
                                            </li>
                                            <li class="font-12 text-white text-uppercase">
                                                <?echo $month ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a
                                                    href="javascript:void(0)"><?echo $application_blog_name ?></a></h3>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?echo $description ?>
                                <!-- <div class="mt-30 mb-0">
                                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                                    <ul class="styled-icons icon-circled m-0">
                                        <li><a href="#" data-bg-color="#3A5795"><i
                                                    class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#55ACEE"><i
                                                    class="fa fa-twitter text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#A11312"><i
                                                    class="fa fa-google-plus text-white"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Latest News</h5>
                            <div class="latest-posts">
                                <?
                                $sqlRelatedBlogs = $cn->selectdb("SELECT application_blog_name, slug, application_blog_image FROM tbl_application_blog WHERE application_blog_id != $application_blog_id ORDER BY bdate LIMIT 10");
                                // echo "SELECT application_blog_name, slug, application_blog_image FROM tbl_application_blog WHERE application_blog_id != $application_blog_id ORDER BY bdate";
                                if( $cn->numRows($sqlRelatedBlogs) > 0 )
                                {
                                    while($rowRelatedBlogs = $cn->fetchAssoc($sqlRelatedBlogs))
                                    {
                                        extract($rowRelatedBlogs);
                                        $href = "application-blog/".urlencode($slug);

                                ?>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb" href="<?echo $href?>">
                                        <img
                                            style="width:70px"
                                             src="application_blog/<?echo $application_blog_image?>" alt="<?echo $application_blog_name ?>"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0"><a href="<?echo $href?>"><?echo $application_blog_name ?></a></h5>
                                    </div>
                                </article>
                                <?
                                    }
                                }
                                else
                                {
                                ?>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    
                                    <div class="post-right">
                                        <h5 class="post-title mt-0"><a href="javascript:void(0)">No related news</a></h5>
                                    </div>
                                </article>
                                <?
                                }
                                ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->

<?
include_once("footer.php");
?>