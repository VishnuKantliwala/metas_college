<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT video_name, video_url FROM tbl_video order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);

?>
<div class="col-sm-12 col-md-6">
    <div class="project mb-30 border-2px">
        
            <?echo $video_url ?>
            
        
        <div class="project-details p-15 pt-10 pb-10">
            <h4 class="font-weight-700 text-uppercase mt-0"><a href="javascript:void(0)"><?//echo $video_name ?></a></h4>
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