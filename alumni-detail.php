<?
$page_id = 37;
$aid = urldecode($_GET['aid']);

include_once("header.php");

$sqlAlumni = $cn->selectdb("select * from tbl_alumni where slug = '".$aid."' ");
if( $cn->numRows($sqlAlumni) > 0 )
{
    $rowAlumni = $cn->fetchAssoc($sqlAlumni);
    extract($rowAlumni);
    $alumni_name = $alumni_fname . " ". $alumni_lname;
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
                            <?echo $alumni_name ?>
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="alumni-list">
                                    <?echo $page_name ?></a></li>
                            <li class="active text-gray-silver">
                                <?echo $alumni_name ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Student Details -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-light" data-bg-img="images/bg/metasLogo.jpg">
        <div class="container">
            <div class="section-content">
                <div class="row" >
                    <div class="col-xs-12 col-sm-8 col-md-9 pull-right pl-60 pl-sm-15" style="background:white">
                        <div>
                            <h3>
                                <?echo $alumni_name ?>
                            </h3>
                            <h5 class="text-theme-colored">
                                <?echo $current_position ?>
                            </h5>

                        </div>
                        <hr/>
                        <h4> Details</h4>
                        <br>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade active in">
                                <dl class="dl-horizontal doctor-info">
                                    <dt>Nationality</dt>
                                    <dd>
                                        <?echo $nationality ?>
                                    </dd>
                                    <hr>
                                    <dt>Country</dt>
                                    <dd>
                                        <?echo $country ?>
                                    </dd>
                                    <hr>
                                    <dt>Birth date</dt>
                                    <dd>
                                        <?
                                            echo date("M d, Y",strtotime($bdate));
                                            // $bdate = date("d-m-Y",strtotime($bdate));
                                        ?>
                                    </dd>
                                    <hr>
                                    <dt>Course</dt>
                                    <dd>
                                        <?echo $course ?>
                                    </dd>
                                    <hr>
                                    <dt>Year of completion:</dt>
                                    <dd>
                                        <?echo $year_of_completion ?>
                                    </dd>
                                    <hr>
                                    <dt>Gender:</dt>
                                    <dd>
                                        <?
                                            echo $gender;
                                        ?>
                                    </dd>
                                    
                                </dl>
                            </div>

                        </div>
                        
                    </div>
                    <div class="col-sx-12 col-sm-4 col-md-3 sidebar pull-left">
                        <div class="doctor-thumb">
                            <img class="list-img list-img--alumni-detail" src="alumni/big_img/<?echo $alumni_image?>"
                                    alt="<?echo $alumni_name ?>">
                        </div>
                        <h4 class="line-bottom">About Me:</h4>
                        <div class="volunteer-address">
                            <ul>
                                <li>
                                    <div class="bg-light media border-bottom-theme-colored-2px p-15 mb-20">
                                        <div class="media-left">
                                            <i class="fa fa-book text-theme-colored font-24 mt-5"></i>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0">Education:</h5>
                                            <p><?echo $course ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="bg-light media border-bottom-theme-colored-2px p-15 mb-20">
                                        <div class="media-left">
                                            <i class="fa fa-envelope-o text-theme-colored font-24 mt-5"></i>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0">Email:</h5>
                                            <p><?echo $email ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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