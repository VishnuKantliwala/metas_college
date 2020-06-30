<?php 
$page_id='17'; 
// Team id - tid
// $tid = $_GET['tid'];
include 'header.php'; 

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
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row ">
                <div class="col-md-6 text-center">
                    <a class="btn__application_link" href="<?echo $application_link?>">
                        <i class="pe-7s-note2"></i>&nbsp;
                        Apply Online 
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <a class="btn__application_link" href="download_pdf/<?echo $application_link_pdf?>" target="_BLANK" download>
                        <i class="pe-7s-note2"></i>&nbsp;
                        Quick guide
                    </a>
                </div>
            </div>
        </div>
        <div class="container mt-30 mb-30 pt-30 pb-30">

            <div class="row blog-posts">
                <div class="col-md-12">
                    <!-- Blog Masonry -->
                    <div id="grid" class="gallery-isotope grid-3 masonry gutter-30 clearfix">
                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/big1.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/1.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/big2.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/1.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/big3.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/big4.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/1.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/1.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                        <!-- Blog Item Start -->
                        <div class="gallery-item">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="images/blog/big4.jpg" alt="" class="img-responsive img-fullwidth">
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div
                                            class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="blog-single-right-sidebar.html">Post title here</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214
                                                    Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i
                                                        class="fa fa-heart-o mr-5 text-theme-colored"></i> 895
                                                    Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit.
                                        Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste
                                        veritatis excepturi, ipsa optio nobis.</p>
                                    <a href="#" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                        <!-- Blog Item End -->

                    </div>
                    <!-- Blog Masonry -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        <ul class="pagination xs-pull-center m-0">
                            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">...</a></li>
                            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->

<!-- Footer -->
<footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
    <div class="container pt-70 pb-40">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-15" alt="" src="images/logo-wide-white.png">
                    <p class="font-16 mb-10">GreenPeace is a library of Crowdfunding and Charity templates with
                        predefined elements which helps you to build your own site. Lorem ipsum dolor sit amet
                        consectetur.</p>
                    <a class="font-14" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read
                        more</a>
                    <ul class="styled-icons icon-dark mt-20">
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a
                                href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a
                                href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a
                                href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a
                                href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a
                                href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Latest News</h5>
                    <div class="latest-posts">
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Useful Links</h5>
                    <ul class="list angle-double-right list-border">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Donor Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Media Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Quick Contact</h5>
                    <ul class="list-border">
                        <li><a href="#">+(012) 345 6789</a></li>
                        <li><a href="#">hello@yourdomain.com</a></li>
                        <li><a href="#" class="lineheight-20">121 King Street, Melbourne Victoria 3000, Australia</a>
                        </li>
                    </ul>
                    <p class="font-16 text-white mb-5 mt-15">Subscribe to our newsletter</p>
                    <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
                        <label class="display-block" for="mce-EMAIL"></label>
                        <div class="input-group">
                            <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control"
                                data-height="37px" id="mce-EMAIL">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i
                                        class="fa fa-paper-plane-o text-white"></i></button>
                            </span>
                        </div>
                    </form>

                    <!-- Mailchimp Subscription Form Validation-->
                    <script type="text/javascript">
                    $('#footer-mailchimp-subscription-form').ajaxChimp({
                        callback: mailChimpCallBack,
                        url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                    });

                    function mailChimpCallBack(resp) {
                        // Hide any previous response text
                        var $mailchimpform = $('#footer-mailchimp-subscription-form'),
                            $response = '';
                        $mailchimpform.children(".alert").remove();
                        if (resp.result === 'success') {
                            $response =
                                '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                resp.msg + '</div>';
                        } else if (resp.result === 'error') {
                            $response =
                                '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                resp.msg + '</div>';
                        }
                        $mailchimpform.prepend($response);
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-black-333">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-md-6">
                    <p class="font-11 text-black-777 m-0">Copyright &copy;2015 ThemeMascot. All Rights Reserved</p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="widget no-border m-0">
                        <ul class="list-inline sm-text-center mt-5 font-12">
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#">Help Desk</a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>

</html>