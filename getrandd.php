<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("select * from tbl_team where `team_articles`!= '' or `team_presentations`!='' or  `team_invites`!='' or `team_thesis`!='' or `team_workshops`!='' or `team_publications`!='' or `team_books`!='' or `team_conferences`!='' order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "faculty/".urlencode($slug);
        // if($image_name != "")
        //     $src = "event/big_img/".$image_name;
        // else 
        //     $src = "./images/user.jpg";


?>
<div class="col-md-12">
    <h3><a href="<?echo $href?>">
            <?echo $team_title ?></a></h3>
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
        <li class="<?echo $class?>"><a href="#team_qualification<?echo $team_id?>" data-toggle="tab">Qualification</a></li>
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
        <li class="<?echo $class?>"><a href="#team_articles<?echo $team_id?>" data-toggle="tab">Articles in Journals</a></li>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_publications) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#team_publications<?echo $team_id?>" data-toggle="tab">Publications</a></li>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_books) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#team_books<?echo $team_id?>" data-toggle="tab">Books</a></li>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_conferences) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#team_conferences<?echo $team_id?>" data-toggle="tab">Conferences</a></li>
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
        <li class="<?echo $class?>"><a href="#team_presentations<?echo $team_id?>" data-toggle="tab">Paper presentations
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
        <li class="<?echo $class?>"><a href="#team_invites<?echo $team_id?>" data-toggle="tab">Invited Talks</a></li>
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
        <li class="<?echo $class?>"><a href="#team_thesis<?echo $team_id?>" data-toggle="tab">Own MPhil/PhD thesis</a></li>
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
        <li class="<?echo $class?>"><a href="#team_workshops<?echo $team_id?>" data-toggle="tab">Workshop/FDP/Training programme
                Attended</a></li>
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_qualification<?echo $team_id?>">
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_articles<?echo $team_id?>">
            <?echo $team_articles ?>
        </div>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_publications) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_publications<?echo $team_id?>">
            <?echo $team_publications ?>
        </div>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_books) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_books<?echo $team_id?>">
            <?echo $team_books ?>
        </div>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($team_conferences) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_conferences<?echo $team_id?>">
            <?echo $team_conferences ?>
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_presentations<?echo $team_id?>">
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_invites<?echo $team_id?>">
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_thesis<?echo $team_id?>">
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
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="team_workshops<?echo $team_id?>">
            <?echo $team_workshops ?>
        </div>
        <?
                            }
                            ?>

    </div>
</div>

<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>