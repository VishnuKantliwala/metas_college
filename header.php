<?
session_start();
include_once("connect.php");
$cn=new connect();
$cn->connectdb();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<?
$sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_page` where page_id=$page_id" );
//	echo $cn->numRows($sql2);
if ($cn->numRows($sql) > 0) 
{
    $row1 = $cn->fetchAssoc($sql);
    $page_id_f=$page_id;
}
?>
<?
if(isset($pid))
{
    $sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_product` where slug='".$pid."'" );
//	echo $cn->numRows($sql2);
    if ($cn->numRows($sql) > 0) 
    {
        $row1 = $cn->fetchAssoc($sql);
    }
}
?>
<?
if(isset($cid))
{
    $sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_category` where slug='".$cid."'" );
//	echo $cn->numRows($sql2);
    if ($cn->numRows($sql) > 0) 
    {
        $row1 = $cn->fetchAssoc($sql);
    }
}
?>
<?
if(isset($tcid))
{
    $sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_team_category` where slug='".$tcid."'" );
//	echo $cn->numRows($sql2);
    if ($cn->numRows($sql) > 0) 
    {
        $row1 = $cn->fetchAssoc($sql);
    }
}
?>
<?
if(isset($tid))
{
    $sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_team` where slug='".$tid."'" );
//	echo $cn->numRows($sql2);
    if ($cn->numRows($sql) > 0) 
    {
        $row1 = $cn->fetchAssoc($sql);
    }
}
?>
<?
if(isset($ifid))
{
    $sql = $cn->selectdb("SELECT  `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_page` where slug='".$ifid."'" );
//	echo $cn->numRows($sql2);
    if ($cn->numRows($sql) > 0) 
    {
        $row1 = $cn->fetchAssoc($sql);
    }
}
?>

    <title>| Metas Adventist college ||
        <?echo $row1['meta_tag_title']?>
    </title>
    <meta name="description" content="<?echo $row1['meta_tag_description']?>">
    <meta name="keywords" content="<?echo $row1['meta_tag_keywords']?>">
    <meta name="title" content="<?echo $row1['meta_tag_title']?>">
    <?
    $cn->setdomain();
    ?>
    

<!-- Page Title -->


<!-- Favicon and Touch Icons -->
<?
$sqlFav = $cn->selectdb("SELECT image_name FROM  `tbl_favicon` " );
if ($cn->numRows($sqlFav) > 0) 
{
    $rowFav = $cn->fetchAssoc($sqlFav);
    extract($rowFav);
    ?>
<link href="favicon/big_img/<?echo $image_name?>" rel="shortcut icon" type="image/png">
<?
}
?>

<!-- Custom css file -->
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<?
if($page_id==1)
{
?>
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<?
}
?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
  #overlay {
  position: absolute; /* Sit on top of the page content */
  /* display: none; Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height:100%; /* Full height (cover the whole page) */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(24, 23, 26, 0.233); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
</style>
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  <?
  $sqlContact = $cn->selectdb("SELECT `con_id`, `maptag`, `contact_desc`, `email`, `contact_no`, `opening_hours`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_contact` where con_id=1" );
  //	echo $cn->numRows($sql2);
  if ($cn->numRows($sqlContact) > 0) 
  {
    $rowContact = $cn->fetchAssoc($sqlContact);
    extract($rowContact);
  }
  ?>
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="widget no-border m-0">
              <ul class="list-inline">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="tel:<?echo $contact_no ?>"><?echo $contact_no ?></a> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> <?echo $opening_hours ?> </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="mailto:<?echo $email ?>"><?echo $email ?></a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget no-border m-0">
              <ul class="list-inline text-right sm-text-center">
                <li>
                  <a href="index.php" class="text-white">Home</a>
                </li>                         
                <li class="text-white">|</li>
                <li>
                  <a href="contact.php" class="text-white">Contact Us</a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container" >
          <nav id="menuzord-right" class="menuzord default">
            <?	
              $sqlLogo = $cn->selectdb("SELECT `logo_id`, `image_name` FROM  `tbl_logo` where logo_id=1" );
              if ($cn->numRows($sqlLogo) > 0) 
              {
                              $rowLogo = $cn->fetchAssoc($sqlLogo);
                              extract($rowLogo);
              }
            ?>
                              
            <a class="menuzord-brand pull-left flip" href="./">
              <img src="logo/big_img/<?echo $image_name?>" alt="Metas Adventist college">
            </a>
            <ul class="menuzord-menu">
              <li><a href="#">About Us</a>
                <ul class="dropdown">    
                  <li><a href="institute-details">Institute Details</a></li> 
                  <li><a href="directors-message">Directors Message</a>   </li>      
                  <li><a href="education-policy">Education Policy</a>  </li>               
                  <li><a href="affiliations-and-accreditation">Affiliations & Accreditation</a>  </li>               
                  <!-- <li><a href="#">Governing body</a>  </li>  
                  <li><a href="#">Stautory committees</a>
                    <ul class="dropdown">
                      <li><a href="stautory-committees.php">Academic Council</a></li>
                      <li><a href="stautory-committees.php">Students Grievnace Redressal cell </a></li>
                      <li><a href="stautory-committees.php">Anti ragging cell</a></li>
                      <li><a href="stautory-committees.php"> Anti ragging Squad </a></li>
                      <li><a href="stautory-committees.php"> Women sexual haressment cell </a></li>                                        
                    </ul>
                  </li>                -->
                </ul>
              </li>


              
              <li><a href="javascript:void(0)">Program</a>
                <ul class="dropdown">    
                  <?
                  $cn->getMenu(0,"","","course/",true, 'tbl_category', 'tbl_product', 'product_name');

                  ?>
                </ul>
              </li>
              <li><a href="javascript:void(0)">Faculties</a>
                <ul class="dropdown">    
                  <?
                  $cn->getMenu(0,"","faculties/","faculty/",false, 'tbl_team_category', 'tbl_team', 'team_title');
                  ?>
                </ul>
              </li>

              


              <!-- <li><a href="#">Faculties</a>
                <ul class="dropdown">  
                  <li><a href="teaching-staff.php"> Teaching </a></li>                                
                  <li><a href="#">Nonteaching</a>
                    <ul class="dropdown">
                      <li><a href="non-teaching-staff.php">Registrar</a></li>  
                      <li><a href="non-teaching-staff.php">Accounts</a></li>  
                      <li><a href="non-teaching-staff.php">Human Resource (HR)</a></li>  
                      <li><a href="non-teaching-staff.php">Communications</a></li>                  
                    </ul>
                  </li>
                </ul>
              </li> -->

              <li><a href="#">Addmission</a>
                <ul class="dropdown">                                                
                  <li><a href="application-for-ug-pg-phd/1/">Application for UG / PG / PHD</a></li>
                  <li><a href="cancellation-policy">Cancellation Policy</a></li>
                  <li><a href="faqs">FAQs</a></li>
                  
                </ul>
              </li>

              <li><a href="#">Infrastructure</a>
                <ul class="dropdown">
                  <?php
                    $sql="SELECT page_id,page_name,slug FROM tbl_page where page_parent_id=19";
                    $result=$cn->selectdb($sql);
                    if($cn->numRows($result)>0){
                      while($row=$cn->fetchAssoc($result)){
                        $sql="SELECT page_id,page_name,slug FROM tbl_page where page_parent_id=".$row['page_id'];
                        $result1=$cn->selectdb($sql);
                        if($cn->numRows($result1)>0){
                  ?>
                        <li><a href="#"><?php echo $row['page_name'];?></a>
                          <ul class="dropdown">
                        <?php
                            while($row11=$cn->fetchAssoc($result1)){
                        ?>
                              <li><a href="infrastructure/<?php echo $row11['slug'];?>"><?php echo $row11['page_name'];?></a></li>
                        <?php
                            }
                        ?>
                            
                          </ul>
                        </li>
                  <?php
                        }else{
                  ?>
                      <li><a href="infrastructure/<?php echo $row['slug'];?>"><?php echo $row['page_name'];?></a></li>
                  <?php
                        }
                      }
                    }
                  ?>
                </ul>
              </li>

              <li><a href="#">R & D</a>
                <ul class="dropdown">  
                  <li><a href="research-and-development-cell"> R & D Cell </a></li>                   
                  <li><a href="research-and-development"> R & D </a></li>                   
                  
                </ul>
              </li>


              <li><a href="#">Student Corner</a>
                <ul class="dropdown">  
                  <li><a href="students-corner"> About Us </a></li>
                  <li><a href="students-research"> R & D </a></li>
                  <li><a href="academic-calendar"> Academic Calendar </a></li>  
                  <li><a href="code-of-conduct"> Code of Conduct  </a></li> 
                  <li><a href="examination"> Examination </a></li> 
                  <li><a href="https://scholarships.gov.in/" target="_BLANK"> Scholarship </a></li>                  
                  <li><a href="#">Placements</a>
                    <ul class="dropdown">
                      <li><a href="students-wise-placement-information">Student wise Placement Information</a></li>  
                      <li><a href="recruiters">Recruiters</a></li>  
                      <li><a href="memorandum-of-understanding">MOU's</a></li>                                                             
                    </ul>
                  </li> 
                  <!-- <li><a href="#"> NAAD </a></li>  -->
                  <li><a href="javascript:void(0)">Alumni Cell</a>
                    <ul class="dropdown">
                      <li><a href="alumni-list">Members</a></li>                                                                 
                      <li><a href="alumni-registration">Registration</a></li>                                                                 
                    </ul>
                  </li>  
                  <!-- <li><a href="#"> Feedback and Testimonials </a></li>                                               -->
                </ul>
              </li>
              <li></li>
              <!-- <li><a href="#">Affiliations & Accreditation</a>
                <ul class="dropdown">  
                  <li><a href="#"> 	AICTE </a></li>  
                  <li><a href="#"> AAA  </a></li> 
                  <li><a href="#"> 	INC </a></li> 
                  <li><a href="#"> 		GNC </a></li>                  
                  <li><a href="#">AISHE</a>
                  <li><a href="#">NAAC</a>
                    <ul class="dropdown">
                      <li><a href="#">AQAR</a></li>  
                      <li><a href="#">IQAC</a></li>                                                             
                    </ul>
                  </li>                                                
                </ul>
              </li> -->
           
              <li><a href="#">Acivities</a>
                <ul class="dropdown">  
                  <?
                  $cn->getMenu(0,"","activities/","activities/",false, 'tbl_eventcategory', 'tbl_event', 'event_title');
                  ?>
                  <!-- <li><a href="#"> 	Management Club </a></li>  
                  <li><a href="#"> Vivacity club  </a></li> 
                  <li><a href="#"> Eureka Club </a></li> 
                  <li><a href="#"> Spectrum Club </a></li>  
                  <li><a href="#"> 	Warrior Club </a></li>  
                  <li><a href="#"> Brainwaves Club  </a></li> 
                  <li><a href="#"> Mindskraft Club </a></li> 
                  <li><a href="#"> Ascent Club </a></li>                                                 -->
                </ul>
              </li>
                                
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>