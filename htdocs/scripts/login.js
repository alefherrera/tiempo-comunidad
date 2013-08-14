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
        if ($(login.target).attr('id') !== 'loginButton') {
            box.hide();
        }
    });
});

function bordes() {
    console.log($("#header").height());
    console.log($("#top").height());
    console.log($("#footer").height());
    return    ($(window).height() - (
            $("#header").height()
            + $("#top").height()
            + $("#footer").height()
            ));

}