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

function bordes(){
    return    ($(window).height() - (
            $("#header").outerHeight()
            + $("#top").outerHeight()
            + $("#footer").outerHeight()
            + parseInt($("#contenido").css("margin-top"))
            + parseInt($("#contenido").css("margin-bottom"))
            + 1
            ));
}