// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    
    button.mouseup(function() {
        box.toggle();
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if($(login.target).attr('id') !== 'loginButton'){
            box.hide();
        }
    });
});

$(document).ready(function (){
    FixFooter();
    window.onresize = function () {
        FixFooter();
    };
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