$(document).ready(function()
{
    $("#demo-form1").on('click','#view',function()
    {

    //some even that will run ajax request - for example click on a button
        var ext=".html";
        var directory = $('#entity').val();
        var tarDir = '../Offer_Letter_Templates/'+directory+'/';
        var template = $('#template_name').val();
        var templateName = template;
        var file = tarDir+templateName+ext;
          $('#save').prop('disabled',false);
        alert(file);

        $.ajax({
        type: 'POST',
        url: 'rtfhtml.php', //this should be url to your PHP file
        data: {target_file: file},
        success: function(data) {
            $(tinymce.get('edit_template').getBody()).html(data);
        }
        });
    });

});