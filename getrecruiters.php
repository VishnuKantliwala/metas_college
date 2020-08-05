<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_recruiter    order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        // $href = "faculty/".urlencode($slug);
        

?>
<div class="col-md-2">
    <div class="attorney">
        <div class="thumb thumb--recruiters" style="text-align: center;" title="<?echo $recruiter_name ?>">
        <?
        if($image_title != "")
        {
        ?>
        <img class="list-img list-img--recruiters" src="recruiter/big_img/<?echo $image_title?>" alt="<?echo $recruiter_name ?>">
        <?
        }
        else
        {
        ?>
        <div class="recruiter-name-logo" style="background:white;"><h4 class="recruiter-name-logo__title"><?echo $recruiter_name ?></h4></div>
        <?
        }
        ?>
        
        </div>
        <!-- <div class="content text-center">
            <h5 class="author mb-0  list-desc list-desc--recruiter"><a class="text-theme-colored" href="javascript:void(0)"><?echo $recruiter_name ?></a></h5>
        </div> -->
    </div>
</div>

<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>