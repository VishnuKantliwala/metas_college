<?
$page_id = 16;
include_once("header.php");
$sql = $cn->selectdb("select extra_icon from tbl_addmore where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<!-- Start main-content -->
<div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="icon/big_img/<?echo $extra_icon?>">
        <?
    $sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
    $row = $cn->fetchAssoc($sql);
    extract($row);
    ?>
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
                            <!-- <li><a href="javascript:void(0)">About Us</a></li> -->
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

                    <div class="col-sm-12 col-md-8 mb-sm-20 wow fadeInUp " data-wow-duration="1s" data-wow-delay="0.5s">
                        <h3>Frequently Asked Questions</h3>
                        <div style="text-align:center">
                            <a style="display:none" class="btn__ask btn btn-border btn-transparent btn-theme-colored btn-circled btn-lg mb-10 smooth-scroll-to-target" href="#ask" >Ask a question?</a>
                        </div>
                        <div id="accordion1" class="panel-group accordion">
                            <?
                            $i=0;
                            $sqlFaqs = $cn->selectdb('select faq_id, faq_title, description from tbl_faq order by recordListingID');
                            if( $cn->numRows($sqlFaqs) > 0 )
                            {
                                while($rowFaqs = $cn->fetchAssoc($sqlFaqs))
                                {
                                    extract($rowFaqs);
                                    $i++;
                            ?>
                            <div class="panel">
                                <div class="panel-title">
                                    <a data-parent="#accordion1" data-toggle="collapse"
                                        href="#accordion1<?echo $faq_id?>" <? if($i==1) { ?>

                                        class="active"
                                        aria-expanded="true"
                                        <?
                                        }
                                        else
                                        {
                                        ?>
                                        class="collapsed"
                                        aria-expanded="false"
                                        <?   
                                        }
                                        ?>


                                        >
                                        <span class="open-sub"></span>
                                        <?echo $faq_title ?>
                                    </a>
                                </div>
                                <div id="accordion1<?echo $faq_id?>" role="tablist" <? if($i==1) { ?>
                                    class="panel-collapse collapse in"
                                    aria-expanded="true"
                                    <?
                                    }
                                    else
                                    {
                                    ?>
                                    class="panel-collapse collapse "
                                    aria-expanded="false" style="height: 0px;"
                                    <?
                                    }
                                    ?>
                                    >
                                    <div class="panel-content my_desc">
                                        <?echo $description ?>
                                    </div>
                                </div>
                            </div>
                            <?
                                }
                            }
                            ?>

                        </div>


                        <!-- <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-0" href="#">View Details</a>  -->
                    </div>
                    <div class="col-sm-12 col-md-4 mt-10 wow fadeInDown  " data-wow-duration="1s" data-wow-delay="0.5s">
                        <div id="ask" class="p-30 bg-theme-colored mt-10 ml-30 ml-xs-0 ml-sm-0">
                            <h3 class="text-white mt-0 mb-10 ">Ask a question?</h3>
                            <!-- Appilication Form Start-->
                            <form id="faq_form" name="faq_form" class=" mt-20" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-20">
                                            <input placeholder="Enter Name" type="text" id="faq_name" name="faq_name"
                                                required="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-20">
                                            <input placeholder="Email" type="text" id="faq_email" name="faq_email"
                                                class="form-control" required="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-20">
                                            <img style="width:100px;height:45px"
                                                src="verificationimage.php?<?php echo rand(0,9999);?>"
                                                alt="verification image, type it in the box" width="50px" height="45px"
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
                                            <textarea placeholder="Enter question." rows="3"
                                                class="form-control required" name="faq_message" id="form_message"
                                                aria-required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-0 mt-10">
                                            <div id="result_faq_form"></div>
                                            <img class="loader_faq_form img_loader" src="images/loader.gif" />
                                            <button type="submit"
                                                class="btn_submit_faq_form btn btn-colored btn-default text-black btn-lg btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Application Form End-->


                        </div>

                        <div class="video-popup">
                            <img alt=" <?echo $page_name ?>" src="page/big_img/<?echo $image?>"
                                class="img-responsive   img-fullwidth mt-10 ml-30 ml-xs-0 ml-sm-0">


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
    <script src="js/forms.js"></script>