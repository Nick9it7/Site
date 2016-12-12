$(document).ready(function(){

var inProgress = false;
var startFrom = 9;

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
            $.ajax({
                    url: 'loadDate.php',
                    method: 'POST',
                    data: {"startFrom" : startFrom},
                    beforeSend: function() {
                    inProgress = true;}
                }).done(function(data){

                data = jQuery.parseJSON(data);
            
                if (data.length > 0) {
                        $.each(data, function(index, data){
                            $("#articles").append("<div class='col-md-3 col-md-offset-1 col-sm-5 col-lg-3 bloc'><a class='block_a' href='shablon.php?id=" + data.id + "'><h4>" + data.title 
                                + "</h4> <div style='background-image: url(" + data.src + ");'></div><p>" + data.description + "</p></a></div>");
                    });

                    inProgress = false;
                    startFrom += 9;
                }
            });
        }
    });
});