// Login Form

$(function() {

    fecha();

    $("#botonera a").each(function() {
        
        if (location.pathname.indexOf($(this).attr("href")) >= 0)
            $(this).toggleClass("seleccionado");
    });
    if ($(".seleccionado").attr("href") === undefined)
        $("#botonera").find("[href='" + "/quienes" + "']").toggleClass("seleccionado");
    
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

function fecha() {
    dows = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    months = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    now = new Date();
    dow = now.getDay();
    d = now.getDate();
    m = now.getMonth();
    h = now.getTime();
    y = now.getYear();
    if (y < 1000)
        y += 1900
    $("#fecha").text(dows[dow] + " " + d + " de " + months[m] + " de " + y);
}
function bordes() {
//    console.log($("#header").height());
//    console.log($("#top").height());
//    console.log($("#footer").height());
    return    ($(window).height() - (
            $("#header").height()
            + $("#top").height()
            + $("#footer").height()
            ));

}

$.fn.imagesLoaded = function () {

    $imgs = this.find('img[src!=""]');
    // if there's no images, just return an already resolved promise
    if (!$imgs.length) {return $.Deferred.resolve().promise();}

    // for each image, add a deferred object to the array which resolves when the image is loaded
    var dfds = [];  
    $imgs.each(function(){

        var dfd = $.Deferred();
        dfds.push(dfd);
        var img = new Image();
        img.onload = function(){dfd.resolve();}
        img.src = this.src;

    });

    // return a master promise object which will resolve when all the deferred objects have resolved
    // IE - when all the images are loaded
    return $.when.apply($,dfds);

}