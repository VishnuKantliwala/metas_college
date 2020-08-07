<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("SELECT blog_name,slug,bdate,blog_image,description  FROM tbl_blog order by bdate DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    while($row = $cn->fetchAssoc($sql1))
    {
        extract($row);
        $href = "news/".urlencode($slug);

?>
<div class="col-md-4">
    <article class="post clearfix mb-30 bg-lighter">
        <div class="entry-header">
            <div class="post-thumb thumb">
                <img  src="blog/big_img/<?echo $blog_image?>"
                    alt="<?echo $blog_name ?>" class="img-responsive img-fullwidth list-img list-img--news">
            </div>
        </div>
        <div class="entry-content border-1px p-20 pr-10">
            <div class="entry-meta media mt-0 no-bg no-border">
                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                    <ul>
                        <li class="font-16 text-white font-weight-600"><?php echo date('d', strtotime($row['bdate']));?></li>
                        <li class="font-12 text-white text-uppercase"><?php echo date('F', strtotime($row['bdate']));?></li>
                    </ul>
                </div>
                <div class="media-body pl-15">
                    <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a class=" list-title list-title--news"
                        href="<?echo $href?>"><?php echo $row['blog_name'];?></a></h4>
                        
                    </div>
                </div>
            </div>
            <p class="mt-10 list-desc list-desc--news"><?php echo substr(strip_tags($row['description']),0,200);?>...</p>
            <a href="<?echo $href?>" class="btn-read-more">Read more</a>
            <div class="clearfix"></div>
        </div>
    </article>
</div>




<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>