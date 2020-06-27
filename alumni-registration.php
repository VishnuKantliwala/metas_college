<?php $page_id=''; include 'header.php'; ?>

<!-- Start main-content -->
<div class="main-content bg-lighter">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg6.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center">Contact Us</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li class="active text-gray-silver">Contact Us</li>
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
            <form id="contact_form" name="contact_form" class="" action="" method="post">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label>First Name <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter First Name" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Last Name <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Last Name" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                <label>Present Country <small>*</small> </label>
                <div class="form-group">
                  <select class="form-control">
                    <option>Australia</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>Brazil</option>
                  </select>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Nationality <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Nationality" required="">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Email <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Email" required="">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Birth Date <small>*</small> </label>
                  <div class="form-group">
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <!-- Datetimepicker Basic Example Script -->
            <script type="text/javascript">
              $(function () {
                $('#datetimepicker1').datetimepicker();
              });
            </script>  
                  </div>
                </div>

                <div class="col-sm-6">
                <label>Gender <small>*</small> </label>
                <div class="radio mt-20">
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">
                    Male </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
                    Female </label>
                  
                </div>
                </div>


                <div class="col-sm-6">
                <label>Maritial Status <small>*</small> </label>
                <div class="radio mt-20">
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">
                    Married </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
                    Unmarried </label>
                  
                </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Year Of Completion <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Year Of Completion" required="">
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Course <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Course" required="">
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group">
                  <label>Current Profession <small>*</small> </label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Current Profession" required="">
                  </div>
                </div>

              </div>
                
           
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Submit</button>
                <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
              </div>
            </form>

            <!-- Contact Form Validation-->
            <script type="text/javascript">
              $("#contact_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
          </div>
        </div>
      </div>
    </section>
    
    
  </div>
  <!-- end main-content -->
  


<?php include 'footer.php'; ?>