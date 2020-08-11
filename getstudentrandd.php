<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("select * from tbl_student where `student_articles`!= '' or `student_presentations`!='' or  `student_invites`!='' or `student_thesis`!='' or `student_workshops`!=''  order by recordListingID DESC LIMIT $limit OFFSET $offset");

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
            <?echo $student_title ?></a></h3>
    <ul id="myTab" class="nav nav-tabs boot-tabs">


        <?
                            $flag = false;
                            if(strip_tags($student_qualification) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_qualification<?echo $student_id?>" data-toggle="tab">Qualification</a></li>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($student_articles) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_articles<?echo $student_id?>" data-toggle="tab">Articles in Journals</a></li>
        <?
                            }
                            ?>

        


        <?
                            if(strip_tags($student_presentations) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_presentations<?echo $student_id?>" data-toggle="tab">Paper presentations
            </a></li>
        <?
                            }
                            ?>


        <?
                            if(strip_tags($student_invites) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_invites<?echo $student_id?>" data-toggle="tab">Invited Talks</a></li>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($student_thesis) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_thesis<?echo $student_id?>" data-toggle="tab">Own MPhil/PhD thesis</a></li>
        <?
                            }
                            ?>


        <?
                            if(strip_tags($student_workshops) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "active";
                                }
                                else
                                    $class = "";
                            ?>
        <li class="<?echo $class?>"><a href="#student_workshops<?echo $student_id?>" data-toggle="tab">Workshop/FDP/Training programme
                Attended</a></li>
        <?
                            }
                            ?>






    </ul>
    <div id="myTabContent" class="tab-content">

        <?
                            $flag = false;
                            if(strip_tags($student_qualification) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_qualification<?echo $student_id?>">
            <?echo $student_qualification ?>
        </div>
        <?
                            }
                            ?>

        <?
                            if(strip_tags($student_articles) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_articles<?echo $student_id?>">
            <?echo $student_articles ?>
        </div>
        <?
                            }
                            ?>

        
        <?
                            if(strip_tags($student_presentations) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_presentations<?echo $student_id?>">
            <?echo $student_presentations ?>
        </div>
        <?
                            }
                            ?>
        <?
                            if(strip_tags($student_invites) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_invites<?echo $student_id?>">
            <?echo $student_invites ?>
        </div>
        <?
                            }
                            ?>
        <?
                            if(strip_tags($student_thesis) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_thesis<?echo $student_id?>">
            <?echo $student_thesis ?>
        </div>
        <?
                            }
                            ?>
        <?
                            if(strip_tags($student_workshops) != '')
                            {
                                if(!$flag)
                                {
                                    $flag = true;
                                    $class = "in active";
                                }
                                else
                                    $class = "";
                            ?>
        <div class="tab-pane fade <?echo $class?> my_desc my_desc__table" id="student_workshops<?echo $student_id?>">
            <?echo $student_workshops ?>
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