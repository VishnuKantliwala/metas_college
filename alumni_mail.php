<?
session_start();
include_once("connect.php");
include_once("./boss/image_lib_rname.php");

$cn=new connect(); 
$cn->connectdb();
    // print_r($_POST);
    $alumni_fname=$_POST['alumni_fname'];
    $alumni_lname=$_POST['alumni_lname'];
    $alumni_name = $alumni_fname." ".$alumni_lname;
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $nationality=$_POST['nationality'];
    $country=$_POST['country'];
    
    // exit();
    $bdate=$_POST['bdate'];
    $marital_status=$_POST['marital_status'];
    $course=$_POST['course'];
    $year_of_completion=$_POST['year_of_completion'];
    $current_position=$_POST['current_position'];

    $verif_box = $_REQUEST["verif_box"];

    $meta_tag_title=$alumni_name;
    $meta_tag_description=$alumni_name;
    $meta_tag_keywords=$alumni_name;					  		
    $slug= str_replace(' ','-', $alumni_name);
    
    if($_FILES['file']['size'] > 0)
    {
        $allowed_types = array ( 'image/jpg', 'image/jpeg', 'image/png' );
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $detected_type = finfo_file( $fileInfo, $_FILES['file']['tmp_name'] );
        
        if ( !in_array($detected_type, $allowed_types) ) {
            display_error("Please select a valid image file!");
            exit();
        }
        $alumni_image = createImage('file', "alumni/");
        $image_file_link = $_SERVER['HTTP_HOST'].'alumni/'.$alumni_image;
    }
    else
    {
        $alumni_image = "";
        $image_file_link = "No Image";
    }

    // if ( $_FILES["file"]['type'] != "application/pdf") 
    // {
    //     display_error("Please select PDF file");
    //     exit();
    // }
    
    if(md5($verif_box).'a4xn' != $_COOKIE['tntcon'])
    {
        display_error('Invalid verification code!');
        exit();
    }



    $cn->insertdb("INSERT INTO `tbl_alumni` (
        `alumni_fname` ,
        `alumni_lname` ,
        `email` ,
        `gender` ,
        `nationality` ,
        `country` ,
        `bdate` ,
        `marital_status`,
        `course`,
        `year_of_completion`,
        `current_position`,
        `alumni_image`,
        `meta_tag_title`,
        `meta_tag_description`,
        `meta_tag_keywords`,
        `slug`,
        `status`
        )
        VALUES (
        '".$alumni_fname."',
        '".$alumni_lname."',
        '".$email."',
        '".$gender."',
        '".$nationality."',
        '".$country."',
        '".$bdate."',
        '".$marital_status."',
        '".$course."',
        '".$year_of_completion."',
        '".$current_position."',
        '".$alumni_image."', 
        '".$meta_tag_title."', 
        '".$meta_tag_description."', 
        '".$meta_tag_keywords."', 
        '".$slug."',
        0
        );");

    
    $to = "info@metasofsda.com";

    

    

    $subject = "Alumni Application from ".$alumni_name;

    $html = "<table style='border:1px solid black'>";
    $html.= "<tr><td>Name : </td><td>".$alumni_name ."</td></tr>";
    $html.= "<tr><td>Email : </td><td>".$email."</td></tr>";
    $html.= "<tr><td>Birth date : </td><td>".$bdate."</td></tr>";
    $html.= "<tr><td>Country : </td><td>".$country."</td></tr>";
    
    $html.= "<tr><td>Marital Status : </td><td>".$marital_status."</td></tr>";
    $html.= "<tr><td>Year of completion : </td><td>".$year_of_completion."</td></tr>";
    $html.= "<tr><td>Current Profession : </td><td>".$current_position."</td></tr>";
    $html.= "<tr><td>Course : </td><td>".$course."</td></tr>";
    $html.= "<tr><td>Picture : </td><td>".$image_file_link."</td></tr></table>";
    
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <info@metascollege.com>' . "\r\n";

    $domain=$_SERVER['HTTP_HOST'];

    if($domain!="localhost")
    {
        display_success('Message Sent!');
        mail($to,$subject,$html,$headers);
    }
    else
    {
        display_success('Message Sent!');
        // display_error("Message Not Sent!");
    }

 
function display_error($error)
{
    echo '<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.' </div>';
}
function display_success($message)
{
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$message.' </div>';
}
// echo "Account successfully updated";		
?>