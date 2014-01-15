$.noConflict();
jQuery(document).ready(function($) {
    $('.carousel').carousel({
        interval: 3000
    });
    $('.listeetapes').click(function(event) {
        $("#main-content").load("templates/bloc_etape.ajax.php?etape=" + $(this).attr('id'), function() {
            $('.carousel').carousel({
                interval: 3000
            });
        });
    });
});



