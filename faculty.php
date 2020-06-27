<?php 
$page_id='6'; 
// Team id - tid
$tid = $_GET['tid'];
include 'header.php'; 
$sqlTeam = $cn->selectdb("SELECT * FROM tbl_team where slug = '".$tid."'");
if( $cn->numRows($sqlTeam) > 0 )
{
  $rowTeam = $cn->fetchAssoc($sqlTeam);
  extract($rowTeam);
}
else
{
  echo "<script>window.open('./404','_SELF')</script>";
}
?>

<?
$sql = $cn->selectdb("select image from tbl_page where page_id =$page_id");
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
                        <h2 class="title text-white text-center">Faculty Details</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <?
                  $cn->getCategories($cat_id, 'tbl_team_category', 'tbl_team', "");
                ?>
                            <li class="active text-gray-silver">
                                <?echo $team_title ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Experts Details -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumb">
                            <img src="team/big_img/<?echo $image_name?>" alt="<?echo $team_title?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="name font-24 mt-0 mb-0">
                            <?echo $team_title?>
                        </h4>
                        <h5 class="mt-5">
                            <?echo $team_position ?>
                        </h5>
                        <h6 class="mt-5">
                            <?echo $team_degree ?>
                        </h6>
                        <?echo $description ?>
                    </div>
                    <div class="col-md-12">
                        <ul id="myTab" class="nav nav-tabs boot-tabs">
                            

                            <?
                            $flag = false;
                            if(strip_tags($team_qualification) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_qualification" data-toggle="tab">Qualification</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($team_articles) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_articles" data-toggle="tab">Articles in Journals</a></li>
                            <?
                            }
                            ?>

                            <?
                            if(strip_tags($team_presentations) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_presentations" data-toggle="tab">Paper presentations
                                </a></li>
                            <?
                            }
                            ?>

                            
                            <?
                            if(strip_tags($team_invites) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_invites" data-toggle="tab">Invited Talks</a></li>
                            <?
                            }
                            ?>
                            
                            <?
                            if(strip_tags($team_thesis) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_thesis" data-toggle="tab">Own MPhil/PhD thesis</a></li>
                            <?
                            }
                            ?>
                            

                            <?
                            if(strip_tags($team_workshops) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
                            <li class="<?echo $class?>"><a href="#team_workshops" data-toggle="tab">Workshop/FDP/Training programme Attended</a></li>
                            <?
                            }
                            ?>

                            




                        </ul>
                        <div id="myTabContent" class="tab-content">
                            
                            <?
                            $flag = false;
                            if(strip_tags($team_qualification) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_qualification">
                                <?echo $team_qualification ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($team_articles) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_articles">
                                <?echo $team_articles ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($team_presentations) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_presentations">
                                <?echo $team_presentations ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($team_invites) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_invites">
                                <?echo $team_invites ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($team_thesis) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_thesis">
                                <?echo $team_thesis ?>
                            </div>
                            <?
                            }
                            ?>
                            <?
                            if(strip_tags($team_workshops) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
                            <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_workshops">
                                <?echo $team_workshops ?>
                            </div>
                            <?
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- end main-content -->
<?php include 'footer.php'; ?>