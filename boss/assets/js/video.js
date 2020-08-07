

$('#myform').submit(function (e) {
    // get the file name, possibly with path (depends on browser)
    var filename = $("#download_file").val();

    // Use a regular expression to trim everything before final dot
    var extension = filename.replace(/^.*\./, '');

    if (extension == filename) {
        extension = '';
    } else {
        // if there is an extension, we convert to lower case
        // (N.B. this conversion will not effect the value of the extension
        // on the file upload.)
        extension = extension.toLowerCase();
    }
    // e.preventDefault();

    if(extension != 'mp4')
    {
        e.preventDefault();
        $('#error').html('Please enter a mp4 file');
        return;
    }    

    if( $("#download_file")[0].files[0].size > 15728640 ) 
    {
        e.preventDefault();
        $('#error').html('Video size should be less then 15MB.');   
    }
    
    // e.preventDefault();
});


// $('#download_file').bind('change', function() {

//     //this.files[0].size gets the size of your file.
//     alert(this.files[0].size);
//     if(this.files[0].size > 15728640)
//     {
//         $('#error').html('Video size should be less then 15MB.');   
//     }
  
// });
