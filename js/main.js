$.noConflict();
jQuery(document).ready(function($) {
    $('.listeetapes').click(function(event) {
        $("#main-content").load("templates/bloc_etape.ajax.php?etape=" + $(this).attr('id'), function() {
            $('.carousel').carousel();
        });
    });
    $('.carousel').carousel();
});



