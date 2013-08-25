// Login Form

$(function() {
   
    fecha();
   
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
function fecha(){
   dows = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
   months = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
   now = new Date();
   dow = now.getDay();
   d = now.getDate();
   m = now.getMonth();
   h = now.getTime();
   y = now.getYear();
   if ( y < 1000)
    y+=1900 
   $("#fecha").text(dows[dow]+" "+d+" de "+months[m]+" de "+y);
}
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