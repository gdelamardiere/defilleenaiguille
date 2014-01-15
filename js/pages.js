$.noConflict();
jQuery(document).ready(function($) {
    $('.rise').click(function(event) {
        img_small = $(this).attr("src");
        img_medium = img_small.replace("/small/", "/medium/");
        img = img_small.replace("/small/", "/");
        $(".image-left img").attr("src", img_medium);
        $(".image-left a").attr("href", img);
    });
});



