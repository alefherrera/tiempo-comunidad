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

$(function () {
    FixFooter();
    window.onresize = function () {
        FixFooter();
    }
});

function FixFooter() {
    $("#contenido").css("min-height",
        ($(window).height() - (
            $("#top").height() + $("#header").height() + $("#footer").height())
            ) 
        + "px");
}