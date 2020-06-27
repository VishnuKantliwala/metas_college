<?
include_once("connect.php");
$cn=new connect();
$cn->connectdb();

	
	$email=mysqli_escape_string($cn->getConnection(),$_POST['inquiry_email']);
	

	$verif_box = $_REQUEST["verif_box"];
				
	if($_POST['inquiry_name']=="")
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter Name! </div>';
	else if($_POST['inquiry_email']=="")
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter Email! </div>';
	else if($_POST['inquiry_phone']=="")
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter Contact Number! </div>';
	
	else if($_POST['inquiry_course']=="")
        echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter course!</div>';
    else if($_POST['inquiry_date']=="")
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter date!</div>';
	else if($_POST['inquiry_message']=="")
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Enter Message!</div>';
	
	else if(md5($verif_box).'a4xn' == $_COOKIE['tntcon'])
	{
		
	
	
		$contact=$cn->selectdb("SELECT * FROM tbl_contact WHERE `con_id`=1");
		while($row_contact = mysqli_fetch_array($contact))
		{
				$to	= $row_contact['email'];
		}
		
		
		
		{
		//$to = "bansalrupali@gmail.com";
		
		$from=$_POST['inquiry_email'];
		$phone="Phone : ".$_POST['inquiry_phone'];
		$headers = "From: ".$from."\r\n"."X-Mailer: php";
		$subject = "Atharv: You have an Inquiry from the ".$from;
		
		
		if(isset($_POST['inquiry_message']))
			$msg="Message:".$_POST['inquiry_message'];
		else
			$msg="";	
		
		if(isset($_POST['inquiry_name']))
			$name="Name:".$_POST['inquiry_name'];
		else
			$name="";
		$course="Course :".$_POST['inquiry_course'];
		$email="Email :".$_POST['inquiry_email'];
		// $service="Service :".$_POST['service'];
						
		
						
		// $body = $name."\n\n".$email."\n\n".$course."\n\n".$phone."\n\n".$service."\n\n".$msg;
		$body = $name."\n\n".$email."\n\n".$course."\n\n".$phone."\n\n".$msg;
		$domain=$_SERVER['HTTP_HOST'];				
		if($domain!="localhost")
		{
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent Successfully! </div>';
			mail($to, $subject, $body, $headers);
		}
		else{
			echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Not Sent! </div>';
		}
		}
			
	}//if
					
	else {
				// if verification code was incorrect then return to contact page and show error
			echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Verification Code entered wrong! </div>';
		}
?>