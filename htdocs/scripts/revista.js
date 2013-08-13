function verificar_revista()
{
    //        $.get('/index.php/verificar_revista/' + $('#ddlMes').val() + '/' + $('#ddlAno').val(), function(revista){
    //            if(revista === 'false')
    //                return false;
    //            window.confirm("Ya existe una revista en el mes y año seleccionado: " + revista + " ¿Continuar?");
    //        });

    var revista;
    $.ajax({url: '/index.php/revista/verificar_revista/' + $('#ddlMes').val() + '/' + $('#ddlAno').val(),
        async: false,
        dataType: 'html',
        success: function(data) {
            revista = data;
        }
    });
    if (revista === 'false')
        return true;
    return window.confirm("Ya existe una revista en el mes y año seleccionado: " + revista + " ¿Continuar?");
}
var texto;
$(function() {
    var parrafo = $('.parrafo p');
    var leermas = $('#leermas');
    var inforev = $('#inforev');
    var tiempomes = $('#tiempomes');
    var formulario = $('#formulario');

    leermas.toggle();
    if (!$('#formulario .error').text() > 0)
        formulario.toggle();

    if (parrafo.text().length > 600)
    {
        texto = parrafo.html();
        parrafo.html(parrafo.html().substring(0, 600));
        parrafo.html(parrafo.html() + '...');
        leermas.toggle();
    }

    leermas.mouseup(function() {
        leermas.removeAttr('href');
        leermas.toggle();
        parrafo.html(texto);
        tiempomes.css("margin-bottom", "20");
    });

    $('#nueva').mouseup(function() {
        formulario.slideToggle("slow", function() {
            $(document).scrollTop($("#nueva").offset().top);
        });
    });

});