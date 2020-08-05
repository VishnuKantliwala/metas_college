<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_event where cat_id like '%".$cat_id.",%'   order by event_title DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "activity-details/".urlencode($slug);
        // if($image_name != "")
        //     $src = "event/big_img/".$image_name;
        // else 
        //     $src = "./images/user.jpg";
        $date = date("M d, Y",strtotime($event_date));


?>
<div class="col-sm-6 col-md-4 col-lg-4">
    <div class="schedule-box maxwidth500 bg-light mb-30">
        <div class="thumb">
            <img class="img-fullwidth list-img list-img--activity" alt="<?echo $event_title ?>" src="event/big_img/<?echo $image_name?>">
            <div class="overlay">
                <a href="<?echo $href?>"><i class="fa fa-link mr-5"></i></a>
            </div>
        </div>
        <div class="schedule-details clearfix p-15 pt-10">
            <h5 class="font-16 title"><a href="<?echo $href?>"><?echo $event_title ?></a></h5>
            <ul class="list-inline font-11 mb-20">
                <li><i class="fa fa-calendar mr-5"></i> <?echo $date ?></li>
            </ul>
            <p class="list-desc list-desc--activity"><?echo substr(strip_tags($description),0,400);?>...</p>
            <div class="mt-10">
                <!-- <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="<?echo $href?>">Register</a> -->
                <a href="<?echo $href?>" class="btn btn-dark btn-sm mt-10">Details</a>
            </div>
        </div>
    </div>
</div>

<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>