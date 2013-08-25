
function cargar_notas(pagina, result)
{
    $.get("/index.php/notas/ajax/" + pagina, function(r) {
        result(r);
    }
    );
}
$(function() {
    crear_tabla(location.href);
});


function masonry() {
    var $container = $('#tabla');
    // initialize
    $container.masonry({
        columnWidth: 246,
        gutter: 10,
        itemSelector: '.nota'
    });
}

function set_trigger()
{
    $("#numeros a").mouseup(function(e)
    {
        crear_tabla($(this).attr("href"));
    });

    $('#tabla img').load(function() {
        masonry();
    });
}

function crear_tabla(url)
{
    var todo = url.indexOf("#");
    var pagina = todo < 0 ? 1 : url.substring(todo + 1);
    cargar_notas(pagina, function(respuesta) {
        $("#posicion_notas").html(respuesta);
        set_trigger();
    });
}