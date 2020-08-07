
<?
	include("../connect.php");
	$cn=new connect();
$cn->connectdb();
	$id=$_GET['id'];

	$query = "SELECT * FROM `tbl_iqac_members` WHERE iqac_members_id =$id";

	$result = $cn->selectdb($query);
    $data = mysqli_fetch_assoc($result);
    extract($data);
	
	$query = "INSERT INTO `tbl_iqac_members`(
		`iqac_members_name`, 
		`description`, 
		`recordListingID`, 
		`meta_tag_title`, 
		`meta_tag_description`, 
		`meta_tag_keywords`, 
		`slug`) 
        VALUES (
            '$iqac_members_name',
            '$description',
            0,
            '$meta_tag_title',
            '$meta_tag_description',
            '$meta_tag_keywords',
            '$slug')";
	$cn->selectdb($query);

	$last_id = mysqli_insert_id($cn->getConnection());
	$sql=$cn->selectdb("SELECT * FROM `tbl_iqac_members` where iqac_members_id=".$last_id);
	$row = mysqli_fetch_assoc($sql);
	//echo "<script>alert('".$last_id."');</script>";
	$cn->selectdb("update tbl_iqac_members set `iqac_members_name`='".$row['iqac_members_name']." (copy)' where iqac_members_id=".$last_id);
	
	header('Location:iqac_membersView.php');
?>