var busy = false;
var offset = 0;
var file = document.getElementById("helper").getAttribute("file-name");
var limit = parseInt(document.getElementById("helper").getAttribute("limit"));
var cat_id = parseInt(document.getElementById("helper").getAttribute("cat_id"));
var search_val = "";
var status = "-1";
var quotation_id = "";
var from_date = "";
var to_date = "";

//alert(id);
function displayRecords(lim, off) {
    
$.ajax({
    type: "GET",
    
    async: true,
    url: file,
    data: "limit=" + lim + "&offset=" + off + "&cat_id=" + cat_id,
    cache: true,
    beforeSend: function() {
    busy = true;
    },
    success: function(html) {
        
        $("#results").append(html);
    
    $('#loader_image').hide();
    // alert($.trim(html)+"");
    if ($.trim(html) == "") {
        
        busy=true;
    } else {
        busy = false;
        //$("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait...</button>').show();
    }
    


    }
});
}

$(document).ready(function() {
// start to load the first set of data
if (busy == false) {
    busy = true;
    // start to load the first set of data
    displayRecords(limit, offset);
    
}
$(window).scroll(function() {
    // make sure u give the container id of the data to be loaded in.
    if ($(window).scrollTop() + $(window).height() > $("#results").height()  && !busy) {
        $('#loader_image').show(500);
        busy = true;
      offset = limit + offset;

      // this is optional just to delay the loading of data
      setTimeout(function() { displayRecords(limit, offset); }, 500);    

    }
  });


});