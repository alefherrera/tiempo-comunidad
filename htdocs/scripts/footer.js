$(window).load(function () {
    fix_footer();
    window.onresize = function () {
        fix_footer();
    };
});

function fix_footer() {
    $("#body").css("min-height",  bordes() + "px");
    console.log("Ventana " + $(window).height());
    console.log("Bordes " + bordes());
}