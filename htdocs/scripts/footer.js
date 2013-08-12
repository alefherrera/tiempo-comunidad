$(function () {
    FixFooter();
    window.onresize = function () {
        FixFooter();
    }
});

function FixFooter() {
    $("#contenido").css("min-height",
        ($(window).height() - (
            $("#header").height()
            + $("#top").height()
            + $("#footer").height()
            + parseInt($("#footer").css("padding-bottom"))
            + parseInt($("#contenido").css("margin-top"))
            + parseInt($("#contenido").css("margin-bottom"))
            + 2
            )
        + "px"));
}