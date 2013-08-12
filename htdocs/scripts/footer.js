$(window).load(function () {
    FixFooter();
    window.onresize = function () {
        FixFooter();
    };
});

function FixFooter() {
    $("#contenido").css("min-height",
        ($(window).height() - (
            $("#header").outerHeight()
            + $("#top").outerHeight()
            + $("#footer").outerHeight()
            + parseInt($("#contenido").css("margin-top"))
            + parseInt($("#contenido").css("margin-bottom"))
            + 1
            )
        + "px"));
}