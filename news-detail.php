<?
$page_id = 58;
$nid = urldecode($_GET['nid']);

include_once("header.php");

$sqlNews = $cn->selectdb("select * from tbl_blog where slug = '".$nid."' ");
if( $cn->numRows($sqlNews) > 0 )
{
    $rowNews = $cn->fetchAssoc($sqlNews);
    extract($rowNews);
    $m_images =  $multi_images;
    
}
else
{
    echo "<script>window.open('./404','_SELF')</script>";
    exit();
}

$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
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
                    <div class="col-md-12">
                        <h2 class="title text-white text-center">
                            <?echo $blog_name ?>
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="news">
                                    <?echo $page_name ?></a></li>
                            <li class="active text-gray-silver">
                                <?echo $blog_name ?>
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
                <div class="col-md-9">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="blog/big_img/<?echo $blog_image?>" alt="<?echo $blog_name ?>"
                                        class="img-responsive img-fullwidth"> </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                    <div
                                        class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">
                                                <?php echo date('d', strtotime($bdate));?></li>
                                            <li class="font-12 text-white text-uppercase">
                                                <?php echo date('F', strtotime($bdate));?></li>
                                        </ul>
                                    </div>
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h3 class="entry-title text-white text-uppercase pt-0 mt-0">
                                                <a><?php echo $blog_name;?></a></h3>

                                        </div>
                                    </div>
                                </div>
                                <div class="my_desc">
                                    <?echo $description ?>
                                    
                                </div>
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
                                $sqlRelatedBlogs = $cn->selectdb("SELECT blog_name, slug, blog_image FROM tbl_blog WHERE blog_id != $blog_id ORDER BY bdate LIMIT 6");
                                if( $cn->numRows($sqlRelatedBlogs) > 0 )
                                {
                                    while($rowRelatedBlogs = $cn->fetchAssoc($sqlRelatedBlogs))
                                    {
                                        extract($rowRelatedBlogs);
                                        $href = "news/".urlencode($slug);
                                ?>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb" href="<?echo $href?>">
                                        <img style="width:70px" src="blog/<?echo $blog_image?>"
                                            alt="<?echo $blog_name ?>"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0"><a class="list-title list-title--rnews"
                                                href="<?echo $href?>">
                                                <?echo $blog_name ?></a></h5>
                                    </div>
                                </article>
                                <?
                                    }
                                }
                                ?>


                            </div>
                        </div>
                        <?
                        if($pdf_file != "")
                        {
                        ?>
                        <div class="widget">
                            <h5 class="widget-title line-bottom">PDF file</h5>
                            <div class="row">
                                <div class="col-md-12 pb-10">
                                    <a download style="width:100%" href="download_pdf/<?echo $pdf_file?>"
                                        class="btn btn-gray btn-theme-colored btn-circled btn-xl">
                                        Download <i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <?
                        }
                        ?>
                        <?
                        
                        if($m_images != "")
                        {
                        ?>
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Gallery</h5>
                            <div id="" class="row">
                                <!-- Flickr Link -->
                                <?
                                $imgs=explode(",",$m_images);
                                for($i=0;$i<count($imgs)-1;$i++)
                                {
                                ?>
                                    <div class="col-md-6">
                                        <a data-rel="prettyPhoto" href="blogF/big_img/<? echo $imgs[$i];?>">
                                            <img 
                                                src="blogF/<? echo $imgs[$i];?>" 
                                                alt="<?echo $blog_name?>"
                                                class="list-img list-img--newsmulti"
                                            >
                                        </a>
                                    </div>
                                <?
                                }
                                ?>
                            </div>
                        </div>
                        <?
                        }
                        ?>
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