function cargar_notas(pagina, result)
{
    $.get("/index.php/notas/ajax/" + pagina ,function (r) { 
        result($.parseJSON(r));
    }
    );
}

$(function() {
    set_trigger();
});

function set_trigger()
{
    $("#numeros a").click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr("href");
        var todo = url.indexOf("#");
        var pagina = url.substring(todo+1);
        location.href = "#" + pagina;
        cargar_notas(pagina,function (respuesta){ 
            $("#viejo").remove();
            var contenido = new Array();
            for (nota in respuesta.notas)
            {
                contenido.push(armar_nota(respuesta.notas[nota]));               
            } 
            var nuevo = $("<div id='nuevo'>").html("<div class='tabla'>" + contenido.join("") + "</div>");
            $("<div id='numeros'>").prependTo(nuevo);
            nuevo.prependTo($("#principal"));
            nuevo.toggle();
            var viejo = $("#tabla_notas").hide("fade");
            viejo.attr("id","viejo");
            nuevo.attr("id","tabla_notas");
            nuevo.show("fade");

            $("#tabla_notas #numeros").html(armar_numeros(respuesta.pagina,respuesta.numeros,respuesta.ultima_pagina));
            $("#tabla_notas #numeros").html($("#tabla_notas #numeros").html() + "<div class='clearboth'></div>");
            set_trigger();
        });
    }
    );
}

function armar_nota(nota)
{    
    return "<div><p><a href='/index.php/nota/"
    + nota.idnota + "'>" + nota.titulo
    + "</a> por " + nota.autor
    + " - " + nota.fecha_alta
    + "</p><p>"
    + nota.contenido + "</p></div>";
}

function armar_numeros(pagina, numeros, ultima_pagina)
{
    var r = "<ul>";
    var li = "<li style='float:left; margin-right: 10px;'>";
    r += li
    + (pagina != 1 ? "<a href='#1' style='text-decoration:underline'><<</a>" : "<<")
    + "</li>"
    + li
    + (pagina != 1 ? "<a href='#" + (parseInt(pagina) - 1) + "' style='text-decoration:underline'><</a>" : "<")
    + "</li>";
    for (numero in numeros)
    {
        var num = numeros[numero];
        num += 1;
            r += li
            + "<a href='#" + (num) + "' style='text-decoration:underline;" + (pagina == num ? "background-color:red" : "") + "'>" + num
            + "</a></li>";
    }
    r += li
    + (pagina != ultima_pagina ? "<a href='#" + (parseInt(pagina) + 1) + "' style='text-decoration:underline'>></a>" : ">")
    + "</li>"
    + li
    + (pagina != ultima_pagina ? "<a href='#" + ultima_pagina + "' style='text-decoration:underline'>>></a>" : ">");
    + "</li></ul>";
    return r;

}