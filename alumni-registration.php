<?
$page_id = 38;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>

<!-- Start main-content -->
<div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="page/big_img/<?echo $image?>">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white text-center">
                            <?echo $page_name ?>
                        </h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./">Home</a></li>
                            <li><a href="alumni-list">Alumni</a></li>
                            <li class="active text-gray-silver">
                                <?echo $page_name ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <!-- <h3 class="line-bottom mt-0 mb-20">GET IN TOUCH</h3> -->
                    <!-- <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error optio in quia ipsum quae neque alias eligendi, nulla nisi. Veniam ut quis similique culpa natus dolor aliquam officiis ratione libero. Expedita asperiores aliquam provident amet dolores.</p> -->
                    <!-- Contact Form -->
                    <form id="alumniForm" name="alumniForm" class="" action="" method="post">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <small>*</small> </label>
                                    <input name="alumni_fname" class="form-control" type="text"
                                        placeholder="Enter First Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name <small>*</small> </label>
                                    <input name="alumni_lname" class="form-control" type="text"
                                        placeholder="Enter Last Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Present Country <small>*</small> </label>
                                <div class="form-group">
                                    <select class="form-control" name="country">
                                        <?
                                        $sqlCountries = $cn->selectdb("SELECT countryname from country order by countryname");
                                        if( $cn->numRows($sqlCountries) > 0 )
                                        {
                                            while($rowCountries = $cn->fetchAssoc($sqlCountries))
                                            {
                                        ?>
                                        <option <? if( $rowCountries['countryname']=='India' ) { ?> selected
                                            <?
                                            }
                                            ?>
                                            value="
                                            <?echo $rowCountries['countryname'] ?>">
                                            <?echo $rowCountries['countryname'] ?>
                                        </option>
                                        <?
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nationality <small>*</small> </label>
                                    <input name="nationality" class="form-control" type="text"
                                        placeholder="Enter Nationality" required="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <small>*</small> </label>
                                    <input name="email" class="form-control" type="text" placeholder="Enter Email"
                                        required="">
                                </div>
                            </div>

                            <div class="col-sm-6 " >
                                <div class="form-group">
                                    <label>Birth Date <small>*</small> </label>
                                    <input name="bdate" class="form-control" type="date" placeholder="Enter Email"
                                        required="">
                                    
                                    </script>
                                </div>
                            </div>

                            <div class="col-sm-6 pb-20">
                                <label>Gender <small>*</small> </label>
                                <div class="radio mt-20">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="inlineRadio1" value="Male">
                                        Male </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="inlineRadio2" value="Female">
                                        Female </label>

                                </div>
                            </div>


                            <div class="col-sm-6 pb-20">
                                <label>Maritial Status <small>*</small> </label>
                                <div class="radio mt-20">
                                    <label class="radio-inline">
                                        <input type="radio" name="marital_status" id="inlineRadio1" value="Male">
                                        Married </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="marital_status" id="inlineRadio2" value="Female">
                                        Unmarried </label>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Year Of Completion <small>*</small> </label>
                                    <input name="year_of_completion" class="form-control" type="text"
                                        placeholder="Enter Year Of Completion" required="">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Course <small>*</small> </label>
                                    <input name="course" class="form-control" type="text" placeholder="Enter Course"
                                        required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Current Profession <small>*</small> </label>
                                    <input name="current_position" class="form-control" type="text"
                                        placeholder="Enter Current Profession" required="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Profile picture <small>*</small> </label>
                                    <button type="button" class=" form-control btn my_ddl btn_select_file">Select Profile
                                        picture</button>
                                    <input type="file" class="select_file" name="file" 
                                        placeholder="Profile picture" style="display:none">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Verification Code <small>*</small> </label>
                                    <input name="verif_box" class="form-control" type="text"
                                        placeholder="Enter Current Profession" required="">
                                </div>
                            </div>

                            

                            

                            <div class="col-sm-6 " >
                                <div class="form-group">
                                <label>Code <small></small> </label>
                                <img class="form-control" style="width:100px;height:50px" src="verificationimage.php?1092"
                                        alt="verification image, type it in the box" width="50px" height="50px"
                                        align="absbottom" />
                                </div>
                            </div>


                            

                        </div>
                        <div class="row">
                        <div class="col-sm-12 mb-10">
                                <div id="result_alumniForm"></div>
                            </div>
                            <div class="col-md-12 ">
                                <div id="loader_contact_form" style="width:100%; text-align: center;">
                                    <img style="display:none;width:30px;" class="loader_contact_form"
                                        src="./images/loader.gif" />
                                </div>
                            </div>

                        </div>

                            
                        <div class="form-group">
                            
                            
                            <button type="submit"
                                class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px btn_submit_alumni_form"
                                data-loading-text="Please wait...">Submit</button>
                            
                        </div>
                    </form>

                    <!-- Contact Form Validation-->

                </div>
            </div>
        </div>
    </section>


</div>
<!-- end main-content -->



<?php include 'footer.php'; ?>
<script src="js/forms.js"></script>