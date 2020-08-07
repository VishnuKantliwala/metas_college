<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$cat_id = $_GET['cat_id'];

$sql1 = $cn->selectdb("select * from tbl_gallery_category where cat_parent_id = ".$cat_id."   order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);

        $sqlHaveSubCat = $cn->selectdb('select cat_id from tbl_gallery_category where cat_parent_id ='.$cat_id);
        if( $cn->numRows($sqlHaveSubCat) > 0 )
        {
            $href = "photo-gallery/".urlencode($slug);    
        }
        else
        {
            $href = "gallery-detail/".urlencode($slug);
        }
        
        
        if($cat_image != "")
            $src = "gallerycategory/big_img/".$cat_image;
        else 
            $src = "./images/sample.jpg";

?>

    <!-- Portfolio Item Start -->
    <div class="col-md-4 gallery-item wheel">
        <div class="work-gallery">
            <div class="gallery-thumb">
                <img class="img-fullwidth gallery_cat_img" alt="<?echo $cat_name ?>" src="<?echo $src?>">
                <div class="gallery-overlay"></div>
                <div class="gallery-contect">
                    <ul class="styled-icons icon-bordered icon-circled icon-sm">
                        <li><a href="<?echo $href?>"><i class="fa fa-link"></i></a></li>
                        <li><a data-lightbox-gallery="gallery1" href="<?echo $src?>"><i class="fa fa-arrows"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="gallery-bottom-part text-center">
                <a href="<?echo $href?>">
                    <h4 class="title text-uppercase font-raleway font-weight-500 m-0 list-title"><?echo $cat_name ?></h4>
                </a>
            </div>
        </div>
    </div>
    <!-- Portfolio Item End -->
    
    <?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>