<?php 
$page_id='1'; 
include 'header.php'; ?>

<!-- Start main-content -->
<div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider no-bg">
        <!-- <video width="1920" height="1280" autoplay muted loop>
        <source src="video/MetasVideo.mp4" type="video/mp4" />                    
    </video> -->


        <div
            style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover; background-color: transparent; background-repeat: no-repeat; background-position: 0% 0%; background-image: none;">
            <div id="overlay"></div>
            <video autoplay muted loop
                style="margin: auto; position: absolute; z-index: -1; top: 0%; left: 0%; width: 1351px; height: auto;">

                <?
                $sqlVideoSlider = $cn->selectdb("select video_file from tbl_video2 where video_id = 1");
                if( $cn->numRows($sqlVideoSlider) > 0 )
                {
                    $rowVideoSlider = $cn->fetchAssoc($sqlVideoSlider);
                    extract($rowVideoSlider);
                    ?>
                    <!-- <source src="video.mp4" type="video/mp4"/> -->
                    <source src="./home_video/<?echo $video_file?>" type="video/mp4"/>    
                    <?
                }
                else
                {
                ?>
                <source src="video/MetasVideo.mp4" type="video/mp4">
                <source src="video/MetasVideo.webm" type="video/webm">
                <?
                }
                ?>


                
            </video>
        </div>

        <div class="display-table">
            <div class="display-table-cell">
                <div class="container pt-200 pb-200">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="tagline text-white font-45 font-weight-500">
                                <span class="typed-text-carousel" data-speed="90" data-back_delay="500"
                                    data-loop="true">
                                    <span>Welcome to Metas Adventist College</span>
                                    <span>The only place for best education</span>
                                    <span>Education For Everyone</span>
                                </span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: home-boxes -->
    <?
    $sqlBelowSlider = $cn->selectdb('select * from tbl_addmore where page_id = 2');
    if( $cn->numRows($sqlBelowSlider) > 0 )
    { 
      ?>
    <section class="bg-silver-light">
        <div class="container pt-0 pb-0">
            <div class="section-content">
                <div class="row equal-height-inner home-boxes" data-margin-top="-100px">
                    <?
            while($rowBelowSlider = $cn->fetchAssoc($sqlBelowSlider))
            {
              extract($rowBelowSlider);
            ?>
                    <div
                        class="col-sm-12 col-md-3 pl-0 pl-sm-15 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay1">
                        <div class="sm-height-auto bg-theme-colored">
                            <div class="text-center pt-30 pb-10">
                                <img src="icon/big_img/<?echo $extra_icon?>" alt="<?echo $title ?>"
                                    class="slider_icons" />
                                <h4 class="text-uppercase mt-20"><a href="javascript:void(0)" class="text-white">
                                        <?echo $title ?></a></h4>
                            </div>
                        </div>
                    </div>

                    <?
            }
            ?>


                </div>
                <div class="row border-5 news-box wow fadeInLeft animation-delay1">
                    <div class='marquee' style="width:100%;overflow:hidden">
                        <?
                        $sqlNews = $cn->selectdb("select * from tbl_news order by recordListingID ");
                        if( $cn->numRows($sqlNews) > 0 )
                        {
                            while($rowNews = $cn->fetchAssoc($sqlNews))
                            {
                                if($rowNews['link_url']!='')
                                    $href= "href='http://".$rowNews['link_url'] ."' target='_BLANk'";
                                else
                                    $href = "javascript:void(0)";
                        ?>
                        <i class="fa fa-hand-o-right"></i> <a <?echo $href?> style="margin-right:20px">
                            <?echo $rowNews['news_name'] ?></a>
                        <?
                            }   
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
    $sqlHomeAbout = $cn->selectdb('select page_name, page_desc from tbl_page where page_id = 3');
    if( $cn->numRows($sqlHomeAbout) > 0 )
    {
      $rowHomeAbout = $cn->fetchAssoc($sqlHomeAbout);
      extract($rowHomeAbout);
    
    ?>
    <!-- Section: About -->
    <section id="about">
        <div class="container pb-70">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h2 class="text-uppercase mt-0">
                            <?echo $page_name ?>
                        </h2>
                        <p class="lead">
                            <?echo strip_tags($page_desc) ?>
                        </p>
                        <div class="row mt-40">
                            <?
                            $sqlHomeAboutMore = $cn->selectdb('SELECT title, small_desc, extra_icon from tbl_addmore where page_id = 3');
                            if( $cn->numRows($sqlHomeAboutMore) > 0 )
                            {
                              while($rowHomeAboutMore = $cn->fetchAssoc($sqlHomeAboutMore))
                              {
                                extract($rowHomeAboutMore);
                              
                          ?>
                            <div class="col-md-6 wow fadeInUp" data-wow-duration="1s">
                                <div class="mb-sm-30">
                                    <img class="img-fullwidth home_about_img" src="icon/big_img/<?echo $extra_icon?>"
                                        alt="<?echo $extra_icon?>">
                                    <h4 class="letter-space-1 mt-10"><span class="text-theme-color-2">
                                            <?echo $title ?></span>
                                    </h4>
                                    <?echo $small_desc ?>
                                    <!-- <a href="#" class="btn btn-sm btn-theme-colored">Read more</a> -->
                                </div>
                            </div>
                            <?                            
                              }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="p-30 bg-theme-colored mt-10">
                            <h3 class="text-white mt-0 mb-10">Inquiry Form</h3>
                            <!-- Appilication Form Start-->
                            <form id="inquiry_form" name="inquiry_form" class=" mt-20" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-20">
                                            <input placeholder="Enter Name" type="text" id="inquiry_name"
                                                name="inquiry_name" required="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <input placeholder="Email" type="text" id="inquiry_email"
                                                name="inquiry_email" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <input placeholder="Phone" type="text" id="inquiry_phone"
                                                name="inquiry_phone" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <div class="styled-select">
                                                <select id="inquiry_course" name="inquiry_course" class="form-control"
                                                    required>
                                                    <option value="">Courses</option>
                                                    <option value="1 Person">Software Engineering</option>
                                                    <option value="2 Person">Computer Traning</option>
                                                    <option value="3 Person">Development Studies</option>
                                                    <option value="Family Pack">Chemical Engineering</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <input name="inquiry_date" class="form-control required date-picker"
                                                type="text" placeholder="Date" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <img style="width:100px;height:50px"
                                                src="verificationimage.php?<?php echo rand(0,9999);?>"
                                                alt="verification image, type it in the box" width="50px" height="50px"
                                                align="absbottom" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group mb-20">
                                            <input name="verif_box" class="form-control required " type="text"
                                                placeholder="code" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea placeholder="Enter Message" rows="3" class="form-control required"
                                                name="inquiry_message" id="form_message"
                                                aria-required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-0 mt-10">
                                            <div id="result_inquiry_form"></div>
                                            <img class="loader_inquiry_form img_loader" src="images/loader.gif" />
                                            <button type="submit"
                                                class="btn_submit_inquiry_form btn btn-colored btn-default text-black btn-lg btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Application Form End-->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
    }
    ?>

    <section id="mission">
        <div class="container-fluid pt-0 pb-0">
            <div class="row equal-height">
                <?
                $sqlHomepdfPage =  $cn->selectdb('select page_name from tbl_page where page_id = 54');
                if( $cn->numRows($sqlHomepdfPage) > 0 )
                {
                  $rowHomepdfPage = $cn->fetchAssoc($sqlHomepdfPage);
                  extract($rowHomepdfPage);
                ?>
                <div class="col-sm-6 col-md-6 xs-pull-none bg-theme-colored wow fadeInLeft" data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class="pt-60 pb-40 pl-20 pr-20 p-md-30">
                        <h2 class="title text-white text-uppercase line-bottom mt-0 mb-30">
                            <?echo $page_name ?>
                        </h2>
                        <?
                        $sqlHomepdf = $cn->selectdb("SELECT homepdf_name, pdf_file FROM tbl_homepdf ORDER BY recordListingID ");
                        if( $cn->numRows($sqlHomepdf) > 0 )
                        {
                            while($rowHomepdf = $cn->fetchAssoc($sqlHomepdf))
                            {
                                extract($rowHomepdf);
                        ?>
                        <div class="icon-box clearfix m-0 p-0 pb-10">

                            <div class=" ml-sm-0">

                                <h5 class="icon-box-title text-white mt-5 mb-10 letter-space-1">
                                    <a href="<?echo $pdf_file?>" target="_BLANK" style="color:white">
                                        <i class="fa fa-arrow-circle-o-right text-theme-color-2 font-20 mr-10"></i>
                                        <?echo $homepdf_name ?>

                                    </a>
                                </h5>
                            </div>
                        </div>
                        <?
                            }
                        }
                        ?>


                    </div>
                </div>
                <?
                }
                ?>
                <?
                $sqlGovlinksPage =  $cn->selectdb('select page_name from tbl_page where page_id = 55');
                if( $cn->numRows($sqlGovlinksPage) > 0 )
                {
                  $rowGovlinksPage = $cn->fetchAssoc($sqlGovlinksPage);
                  extract($rowGovlinksPage);
                ?>
                <div class="col-sm-6 col-md-6 xs-pull-none  wow fadeInLeft border-3" data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class="pt-60 pb-40 pl-20 pr-20 p-md-30">
                        <h2 class="title  text-uppercase line-bottom mt-0 mb-30">
                            <?echo $page_name ?>
                        </h2>
                        <?
                        $sqlGovlinks = $cn->selectdb("SELECT link_url, image_title FROM tbl_govlink ORDER BY recordListingID ");
                        if( $cn->numRows($sqlGovlinks) > 0 )
                        {
                            while($rowGovlinks = $cn->fetchAssoc($sqlGovlinks))
                            {
                                extract($rowGovlinks);
                        ?>
                        <div class="icon-box clearfix m-0 p-10 pb-10 col-md-6 ">
                            <a href="<?echo $link_url?>" target="_BLANK" class=" list-img--govlinks__holder border-3">
                                <img class="list-img list-img--govlinks" src="govlink/big_img/<?echo $image_title?>" />
                            </a>
                        </div>
                        <?
                            }
                        }
                        ?>


                    </div>
                </div>
                <?
                }
                ?>

            </div>
        </div>
    </section>

    <?
    $sqlHomeWhy = $cn->selectdb('select page_name, page_desc from tbl_page where page_id = 4');
    if( $cn->numRows($sqlHomeWhy) > 0 )
    {
      $rowHomeWhy = $cn->fetchAssoc($sqlHomeWhy);
      extract($rowHomeWhy);
    
    ?>
    <!-- Section: About -->
    <section id="about">
        <div class="container mt-50 pb-70 pt-0" style="margin-left: 0px;padding-left: 0px;">
            <div class="section-content">
                <div class="row mt-10">
                    <div class="col-sm-12 col-md-6 mt-10 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="video-popup">
                            <img alt="" src="images/about/about.png"
                                class="img-responsive img-fullwidth mt-10 ml-xs-0 ml-sm-0">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-sm-20 wow fadeInUp " style="padding-left: 25px;"
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <h3 class="text-uppercase mt-15">
                            <?echo $page_name ?>
                        </h3>

                        <?echo $page_desc ?>
                        <!-- <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-0" href="#">View Details</a>  -->


                        <div class="row">
                            <?
                            /*
                              $sqlHomeWhyMore = $cn->selectdb('SELECT title, small_desc, extra_icon from tbl_addmore where page_id = 4');
                              if( $cn->numRows($sqlHomeWhyMore) > 0 )
                              {
                                while($rowHomeWhyMore = $cn->fetchAssoc($sqlHomeWhyMore))
                                {
                                  extract($rowHomeWhyMore);
                                
                            ?>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="icon-box p-0 mb-40">
                                    <a href="javascript:void(0)"
                                        class="icon bg-theme-colored pull-left sm-pull-none flip mr-10">
                                        <img class="home_why_extra_img" src="icon/big_img/<?echo $extra_icon?>"
                                            alt="<?echo $extra_icon?>">
                                    </a>
                                    <div class="icon-box-details ml-sm-0">
                                        <h5 class="icon-box-title mt-15 letter-space-1 font-weight-600 mb-5">
                                            <?echo $title ?>
                                        </h5>
                                        <p class="text-gray">
                                            <?echo strip_tags($small_desc) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?                            
                              }
                            }
                            */
                            ?>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    <?
    }
    ?>

    <?php
        $sql="SELECT P.product_name,P.description,C.cat_name,P.product_image,P.slug FROM tbl_product AS P, tbl_category AS C WHERE P.cat_id = C.cat_id LIMIT 3";
        $result=$cn->selectdb($sql);
        if($cn->numRows($result)>0){
    ?>
    <!-- Section: courses -->
    <section>
        <div class="container pt-70 pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">Our <span
                                class="text-theme-color-2"> Courses</span></h2>
                        <p>A college course is a class offered by a college or university.</p>
                    </div>
                </div>
            </div>
            <div class="row multi-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-3col owl-nav-top" data-dots="true">
                        <?php
                            while($row=$cn->fetchAssoc($result)){
                        ?>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <img class="img-fullwidth" alt=""
                                        src="product/big_img/<?php echo $row['product_image'];?>">
                                    <div class="hover-link" style="left:35%;">
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-center font-10"
                                            href="course/<?php echo $row['slug'];?>"><span>Read More</span> </a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5"><?php echo $row['cat_name'];?></h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a
                                            href="course/<?php echo $row['slug'];?>"><?php echo $row['product_name'];?></a>
                                    </h4>
                                    <p><?php echo substr(strip_tags($row['description']),0,90);?>...</p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>Time</strong> June 26</li>
                                        <li class="target-fund"><strong>Discount</strong>15%</li>
                                        <li class="remaining-days"><strong>Duration</strong>6 Months</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <?php
        $sql="SELECT title,small_desc,extra_desc FROM tbl_addmore WHERE page_id=35";
        $result=$cn->selectdb($sql);
        if($cn->numRows($result)>0){
    ?>
    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay" data-bg-img="images/bg/bg6.jpg" data-parallax-ratio="0.7">
        <div class="container pt-70 pb-60">
            <div class="row">
                <?php
                    while($row=$cn->fetchAssoc($result)){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="<?php echo $row['extra_desc'];?> mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="<?php echo strip_tags($row['small_desc']);?>"
                            class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                        <h4 class="text-white text-uppercase"><?php echo $row['title'];?></h4>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <!-- Section: Teachers -->
    <section id="teachers">
        <div class="container pt-70 pb-70">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">Our <span
                                class="text-theme-color-2"> Teachers</span></h2>
                        <p>A college course is a class offered by a college or university.</p>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-4col">
                        <div class="item">
                            <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="" src="images/metas/team/a1.jpeg">
                                    <div class="team-overlay"></div>
                                </div>
                                <div class="team-details bg-silver-light pt-10 pb-10">
                                    <h4 class="text-uppercase font-weight-600 m-5"><a href="#">Rajesh Kumar</a></h4>
                                    <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Teacher</h6>
                                    <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="" src="images/metas/team/a2.jpeg">
                                    <div class="team-overlay"></div>
                                </div>
                                <div class="team-details bg-silver-light pt-10 pb-10">
                                    <h4 class="text-uppercase font-weight-600 m-5"><a href="#">Anil Mehta</a></h4>
                                    <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Commerce Teacher</h6>
                                    <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="" src="images/metas/team/a3.jpeg">
                                    <div class="team-overlay"></div>
                                </div>
                                <div class="team-details bg-silver-light pt-10 pb-10">
                                    <h4 class="text-uppercase font-weight-600 m-5"><a href="#">Kapil Rathi</a></h4>
                                    <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Nursing Teacher</h6>
                                    <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                <div class="team-thumb">
                                    <img class="img-fullwidth" alt="" src="images/metas/team/a4.jpeg">
                                    <div class="team-overlay"></div>
                                </div>
                                <div class="team-details bg-silver-light pt-10 pb-10">
                                    <h4 class="text-uppercase font-weight-600 m-5"><a
                                            href="page-teachers-details.html">Rachna Shukla</a></h4>
                                    <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Management Teacher</h6>
                                    <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?
    $sqlHomeEventsPage = $cn->selectdb('select page_name, page_desc, image from tbl_page where page_id = 59');
    if( $cn->numRows($sqlHomeEventsPage) > 0 )
    {
      $rowHomeEventsPage = $cn->fetchAssoc($sqlHomeEventsPage);
      extract($rowHomeEventsPage);
    
    ?>
    <!-- Section: events -->

    <section id="events" class="divider parallax layer-overlay overlay-dark-8" data-stellar-background-ratio="0.5"
        <?
            $src = $image =="" ? "images/bg/bg1.jpg" : "page/big_img/".$image;
        ?>
        data-bg-img="<?echo $src?>"
        
        >
        <div class="container pt-70 pb-40">
            <div class="section-title mb-30">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="mt-0 line-height-1 text-center mb-10 text-white text-uppercase"><?echo $page_name ?></h2>
                        <p class="text-white"><?echo strip_tags($page_desc) ?></p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <?
                    $sqlHomeEvent = $cn->selectdb("SELECT * FROM tbl_event where event_date > CURDATE()  ORDER BY recordListingID");
                    if( $cn->numRows($sqlHomeEvent) > 0 )
                    {
                        while($rowHomeEvent = $cn->fetchAssoc($sqlHomeEvent))
                        {
                            extract($rowHomeEvent);
                            $date = date("M d, Y",strtotime($event_date));
                            $href = "activity-details/".urlencode($slug);

                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 mb-30 wow fadeInRight" data-wow-duration="1s"
                        data-wow-delay="0.5s">
                        <div class="pricing table-horizontal maxwidth400">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <img class="img-fullwidth list-img list-img--activity" alt="<?echo $event_title ?>" src="event/big_img/<?echo $image_name?>">
                                    </div>
                                </div>
                                <div class="col-md-6 p-30 pl-sm-50">
                                    <h4 class="mt-0 mb-5"><a href="<?echo $href?>" class="text-white list-title"><?echo $event_title ?></a></h4>
                                    <ul class="list-inline mb-5 text-white">
                                        <li class="pr-0"><i class="fa fa-calendar mr-5"></i> <?echo $date ?> |</li>
                                        
                                    </ul>
                                    <p class="mb-15 mt-15 text-white list-desc list-desc--activity" ><?echo substr(strip_tags($description),0,400);?>...</p>
                                    <a class="text-white font-weight-600" href="<?echo $href?>">Read More →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?
                        }
                    }
                    else
                    {
                    ?>
                    <div class="col-md-12 text-center"><h4 class="mt-0 line-height-1 text-center mb-10 text-white text-uppercase">No upcoming events.</h4></div>
                    <?
                    }
                    ?>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <?
    }
    ?>

    <!-- Gallery Grid 3 -->
    <section id="gallery">
        <div class="container pt-70 pb-70">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="mt-0 line-height-1 text-center mb-10 text-black-333 text-uppercase">Our <span
                                class="text-theme-color-2"> Gllery</span></h2>
                        <!-- <p class="mb-0 pb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p> -->
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Portfolio Filter -->
                        <!-- <div class="portfolio-filter font-alt align-center text-center mb-6 0">
                <a href="#" class="active" data-filter="*">All</a>
                <a href="#photos" class="" data-filter=".photos">Photos</a>
                <a href="#campus" class="" data-filter=".campus">Campus</a>
                <a href="#students" class="mt-10" data-filter=".students">Students</a>
              </div> -->
                        <!-- End Portfolio Filter -->

                        <!-- Portfolio Gallery Grid -->
                        <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item campus">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="images/gallery/1.jpg" alt="img">
                                    <div class="overlay-shade"></div>
                                    <div class="text-holder">
                                        <!-- <div class="title text-center">Sample Title</div> -->
                                    </div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="images/gallery/1.jpg" data-lightbox-gallery="gallery"><i
                                                        class="fa fa-picture-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->


                            <!-- Portfolio Item Start -->
                            <div class="gallery-item campus">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="images/gallery/2.jpg" alt="img">
                                    <div class="overlay-shade"></div>
                                    <div class="text-holder">
                                        <!-- <div class="title text-center">Sample Title</div> -->
                                    </div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="images/gallery/2.jpg" data-lightbox-gallery="gallery"><i
                                                        class="fa fa-picture-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->



                            <!-- Portfolio Item Start -->
                            <div class="gallery-item campus">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="images/gallery/3.jpg" alt="img">
                                    <div class="overlay-shade"></div>
                                    <div class="text-holder">
                                        <!-- <div class="title text-center">Sample Title</div> -->
                                    </div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="images/gallery/3.jpg" data-lightbox-gallery="gallery"><i
                                                        class="fa fa-picture-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->




                            <!-- Portfolio Item Start -->
                            <div class="gallery-item campus">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="images/gallery/4.jpg" alt="img">
                                    <div class="overlay-shade"></div>
                                    <div class="text-holder">
                                        <!-- <div class="title text-center">Sample Title</div> -->
                                    </div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a href="images/gallery/4.jpg" data-lightbox-gallery="gallery"><i
                                                        class="fa fa-picture-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Item End -->

                        </div>
                        <!-- End Portfolio Gallery Grid -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php
    $sql="SELECT blog_name,slug,bdate,blog_image,description FROM tbl_blog ORDER BY recordListingID LIMIT 3";
    $result = $cn->selectdb($sql);
    if($cn->numRows($result)>0){
?>
<!-- Section: Blog -->
<section id="blog">
    <div class="container pt-70">
        <div class="section-title text-center">
            <div class="row">
                <?
                $sqlBlogsPage = $cn->selectdb("SELECT page_name, page_desc FROM tbl_page where page_id = 57");
                if( $cn->numRows($sqlBlogsPage) > 0 )
                {
                    $rowBlogsPage = $cn->fetchAssoc($sqlBlogsPage);
                    extract($rowBlogsPage);
                ?>
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="mt-0 line-height-1 text-uppercase"><a href="news"><?echo $page_name ?>
                    </h2></a>
                    <p><?echo strip_tags($page_desc) ?></p>
                </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-3col owl-nav-top mb-sm-0" data-dots="true">
                    <?php
                    while($row=$cn->fetchAssoc($result)){
                ?>
                    <div class="item">
                        <article class="post clearfix maxwidth600 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="blog/big_img/<?php echo $row['blog_image'];?>" alt=""
                                        class="img-responsive img-fullwidth list-img list-img--news">
                                </div>
                                <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <ul>
                                                <li><a class="text-white" href="#"><i
                                                            class="fa fa-calendar-o mt-0 pt-0"></i>
                                                        <?php echo date('d', strtotime($row['bdate']));?> <br>
                                                        <?php echo date('F Y', strtotime($row['bdate']));?></a>
                                                </li>
                                                <!-- <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-content border-1px p-20">
                                <h4 class="entry-title mt-0 pt-0"><a class=" list-title list-title--news"
                                        href="blog-detail/<?php echo $row['slug'];?>"><?php echo $row['blog_name'];?></a>
                                </h4>
                                <p class="text-left mb-20 mt-5 font-13  list-desc list-desc--homenews">
                                    <?php echo substr(strip_tags($row['description']),0,200);?>...</p>
                                <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left"
                                    href="blog-detail/<?php echo $row['slug'];?>">Read more</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
?>




<!-- Divider: Clients -->
<section class="clients bg-theme-colored">
    <div class="container pt-10 pb-10 pb-sm-0 pt-sm-0">
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="mt-0 line-height-1 text-uppercase text-white">Affiliations
                </h2>
                <hr/>
            </div>
            <div class="col-md-12">
                <!-- Section: Clients -->
                <div class="owl-carousel-6col transparent text-center owl-nav-top">
                    <?
                    $sqlAffiliations = $cn->selectdb("select affiliations_image, affiliations_name from tbl_affiliations order by recordListingID");
                    if( $cn->numRows($sqlAffiliations) > 0 )
                    {
                        while($rowAffiliations = $cn->fetchAssoc($sqlAffiliations))
                        {
                            extract($rowAffiliations);
                    ?>
                    <div class="item"> 
                        <a href="affiliations-and-accreditation">
                            <img class="list-img list-img--affiliation" src="./affiliations/big_img/<?echo $affiliations_image?>" alt="<?echo $affiliations_name?>">
                        </a>
                        <p class="text-white"><?echo $affiliations_name?></p>
                    </div>
                    <?
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- end main-content -->

<!-- Footer -->
<?php include 'footer.php'; ?>
<!--FOR Forms-->

<script src="js/forms.js"></script>

<script src="js/jquery.marquee.js"></script>

<script>
$(function() {
    $('.marquee').marquee({

        //If you wish to always animate using jQuery
        allowCss3Support: true,

        //works when allowCss3Support is set to true - for full list see http://www.w3.org/TR/2013/WD-css3-transitions-20131119/#transition-timing-function
        css3easing: 'linear',

        //requires jQuery easing plugin. Default is 'linear'
        easing: 'linear',

        //pause time before the next animation turn in milliseconds
        delayBeforeStart: 2000,
        //'left', 'right', 'up' or 'down'
        direction: 'left',

        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true,

        //speed in milliseconds of the marquee in milliseconds
        duration: 10000,

        //gap in pixels between the tickers
        gap: 20,

        //on cycle pause the marquee
        pauseOnCycle: false,

        //on hover pause the marquee - using jQuery plugin https://github.com/tobia/Pause
        pauseOnHover: true,

        //the marquee is visible initially positioned next to the border towards it will be moving
        startVisible: true

    });
});
</script>