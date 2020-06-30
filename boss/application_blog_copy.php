
<?
	include("../connect.php");
	$cn=new connect();
    $cn->connectdb();
    $id=$_GET['id'];
    
	$query = "SELECT 
    `application_blog_id`, 
    `application_blog_name`, 
    `description`, 
    `cat_id`, 
    `price`, 
    `bdate`, 
    `meta_tag_title`, 
    `meta_tag_description`, 
    `meta_tag_keywords`, 
    `slug` 
    FROM `tbl_application_blog` WHERE application_blog_id =$id";

	$result = $cn->selectdb($query);
    $data = mysqli_fetch_assoc($result);
    extract($data);
    
	$query = "INSERT INTO `tbl_application_blog`(
        `application_blog_name`, 
        `description`, 
        `cat_id`, 
        `application_blog_image`, 
        `price`, 
        `bdate`, 
        `recordListingID`, 
        `pdf_file`, 
        `meta_tag_title`, 
        `meta_tag_description`, 
        `meta_tag_keywords`, 
        `multi_images`, 
        `slug`) 
        VALUES (
            '$application_blog_name',
            '$description',
            '$cat_id',
            '',
            null,
            '$bdate',
            0,
            '',
            '$meta_tag_title',
            '$meta_tag_description',
            '$meta_tag_keywords',
            '',
            '$slug')
            ";
	$cn->selectdb($query);

	$last_id = mysqli_insert_id($cn->getConnection());
	$sql=$cn->selectdb("select * from `tbl_application_blog` where application_blog_id=".$last_id);
	$row = mysqli_fetch_assoc($sql);
	// echo "<script>alert('".$last_id."');</script>";
	$cn->selectdb("update tbl_application_blog set `application_blog_name`='".$row['application_blog_name']." (copy)' where application_blog_id=".$last_id);
	
	header('Location:applicationBlogView.php');
?>