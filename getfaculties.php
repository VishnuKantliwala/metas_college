<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_team where cat_id like '%".$cat_id.",%'   order by team_title DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "faculty/".urlencode($slug);
        if($image_name != "")
            $src = "team/big_img/".$image_name;
        else 
            $src = "./images/user.jpg";

?>
<div class="col-md-3">
    <div class="hover-effect mb-30">
        <div class="thumb">
            <img class="img-fullwidth faculty_listing_img" alt="<?echo $team_title ?>" src="team/big_img/<?echo $image_name?>">
            
        </div>
        <div class="details p-15 pt-10 pb-10">
            <h4 class="title mb-5"><?echo $team_title ?></h4>
            <h5 class="sub-title mt-0 mb-15"><?echo  $team_degree ?></h5>
            <a class="btn btn-theme-colored btn-sm" href="<?echo $href?>">view details</a>
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