<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_gallery where cat_id like  '%".$cat_id.",%'   order by recordListingID ASC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        if($multi_images != "")
        {
            $imgs=explode(",",$multi_images);
            for($i=0;$i<count($imgs)-1;$i++)
            {
                $src="galleryF/big_img/". $imgs[$i];
?>
<!-- Portfolio Item Start -->
<div class="col-md-4 gallery-item wheel">
    <div class="work-gallery">
        <div class="gallery-thumb">
            <img class="img-fullwidth gallery_cat_img" alt="<?echo $gallery_name ?>" src="<?echo $src?>">
            <div class="gallery-overlay"></div>
            <div class="gallery-contect">
                <ul class="styled-icons icon-bordered icon-circled icon-sm">
                    <li><a data-lightbox-gallery="gallery1" href="<?echo $src?>"><i class="fa fa-arrows"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Item End -->

<?
            }
        }
?>



<?
    }
}
else{
    //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
}
					
?>