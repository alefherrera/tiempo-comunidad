$(window).load(function () {
    fix_footer();

    window.onresize = function () {
        fix_footer();
        masonry();
    };
    
});


function fix_footer() {
    $("#body").css("min-height",  bordes() + "px");

}