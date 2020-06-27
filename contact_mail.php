<?
include_once("connect.php");
$cn=new connect();
$cn->connectdb();

    $email=mysqli_escape_string($cn->getConnection(),$_POST['email']);
	
	$to = "info@icedinfotech.com";
	
	$from=$_POST['email'];
	$headers = "From: ".$from."\r\n"."X-Mailer: php";

	$subject = $_POST['subject'];
	$msg="Message:".$_POST['message'];
	$phone="Phone Number :".$_POST['phone'];
	$name="Name:".$_POST['name'];
	$email="Email:".$_POST['email'];
					
	$body = $name."\n\n".$email."\n\n".$phone."\n\n".$msg;

	if($domain!="localhost")
	{
		$result = $cn->selectdb("INSERT INTO `tbl_contactdetails`(
			`contact_name`, 
			`email`, 
			`phone`, 
			`subject`, 
			`message`) 
			VALUES (
				'".$_POST['name']."',
				'".$_POST['email']."',
				'".$_POST['phone']."',
				'".$_POST['subject']."',
				'".$_POST['message']."'
				)");
		if($result == 1)
		{
			echo '<script>alert("Message sent successfully!");</script>';
			mail($to, $subject, $body, $headers);
		}
		else{
			echo '<script>alert("Message not sent!");</script>';
		}
	}
	else{
		echo '<script>alert("Message not sent!");</script>';
	}
	header('location: contact.php');
?>