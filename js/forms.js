$('#inquiry_form').submit(function (e) {
    
    e.preventDefault();

    let result;
    $('.loader_inquiry_form').show(500);
    $('.btn_submit_inquiry_form').hide(500);


    const formData = $(this);
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "submit_inquiry.php",
            data: formData.serialize(),
            cache : false,
            processData: false,
            success: (result)=>{
                // alert(result)
                return result;
            }
          }).then((result)=>{
            if($.trim(result) == '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent Successfully! </div>')
            {
                $('#inquiry_form')[0].reset();

            }
            else
            {
                $('.btn_submit_inquiry_form').show(500);
            }
            $('#result_inquiry_form').html(result);
            $('.loader_inquiry_form').hide(500);
            
          });
    }, 500);
    
});


$('#faq_form').submit(function (e) {
    
    e.preventDefault();

    let result;
    $('.loader_faq_form').show(500);
    $('.btn_submit_faq_form').hide(500);


    const formData = $(this);
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "submit_faq.php",
            data: formData.serialize(),
            cache : false,
            processData: false,
            success: (result)=>{
                // alert(result)
                return result;
            }
          }).then((result)=>{
            if($.trim(result) == '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Message Sent Successfully! </div>')
            {
                $('#faq_form')[0].reset();

            }
            else
            {
                $('.btn_submit_faq_form').show(500);
            }
            $('#result_faq_form').html(result);
            $('.loader_faq_form').hide(500);
            
          });
    }, 500);
    
});
