$(document).ready(function(){
    $("#search").click(function(){
        var text = $('#phone').val();
        $.ajax({
            type: "POST",
            url: "view.php",
            data: {'text':text},
            dataType: "html",
            
            success: function(text){
                $('.response').html(text);
            }

        });
    });
});