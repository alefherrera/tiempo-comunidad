
function cargar_notas(pagina, result)
{
    $.get("/notas/ajax/tabla/" + pagina, function(r) {
        result(r);

    }
    );
}
$(function() {
    crear_tabla(location.href);
    window.onresize = function() {
        //masonry();
    };

});


function masonry() {
    var $container = $('#tabla');
    setTimeout(function() {
        // initialize
        $container.masonry({
            singleMode: true,
            columnWidth: 0,
            itemSelector: '.nota',
            transitionDuration: 0,
            isFitWidth: true,
            isRTL: false
        });
        
        $(".nota").each(function() {
            $(this).css({left: $(this).position().left - 1});
            if(Math.ceil($(this).position().left / 293) == 2){
                $(this).css({left: $(this).position().left - 1});
            }
        });
        $(".nota").each(function() {
            $(this).css({left: $(this).position().left - 1});
        });
        $("#tabla").width($("#tabla").width() - 3);
    }
    , 50);

}

function set_trigger()
{
    $("#numeros a").mouseup(function(e)
    {
        crear_tabla($(this).attr("href"));
    });


}

function crear_tabla(url)
{
    var todo = url.indexOf("#");
    var pagina = todo < 0 ? 1 : url.substring(todo + 1);
    cargar_notas(pagina, function(respuesta) {
        $("#posicion_notas").html(respuesta);
        set_trigger();
        //masonry();
    });
}