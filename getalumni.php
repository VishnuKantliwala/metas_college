<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT slug, alumni_fname, alumni_lname, alumni_image, current_position FROM tbl_alumni WHERE `status`=1  order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "alumni-list/".urlencode($slug);

?>
<div class="item col-md-3">
    <div class="hover-effect mb-30">
        <a href="<?echo $href?>">
        <div class="thumb">
            
            <img class="img-fullwidth list-img list-img--alumni" src="alumni/big_img/<?echo $alumni_image?>" alt="<?echo $alumni_fname ?>">
        
        </div>
        </a>
        <div class="details p-15 pt-10 pb-10">
            <h4 class="title mb-5"><?echo $alumni_fname . " ". $alumni_lname ?></h4>
            <h5 class="sub-title mt-0 mb-15"><?echo $current_position ?></h5>
            <a class="btn btn-theme-colored btn-sm" href="<?echo $href?>">view
                details</a>
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