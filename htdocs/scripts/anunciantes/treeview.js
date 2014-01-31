
$(document).ready(function() {
    //Escondo los filtros hasta que carguen
    $("#filtros").toggle();
    $("#treeview").toggle();

    $("#treeview").kendoTreeView({
        checkboxes: {
        },
        select: function(e) {
            e.preventDefault();
            nodo = $(e.node).find(":checkbox").eq(0);
            nodo.trigger("click");
        }
    });

    $(".treeview_filtros").each(function(index) {
        $(this).kendoTreeView({
            checkboxes: {
                checkChildren: true
            },
            select: function(e) {
                e.preventDefault();
                nodo = $(e.node).find(":checkbox").eq(0);
                nodo.trigger("click");
            }
        });
    });

    //Timeout y filtro de tabla
    var actualizar_click = function(e) {
        checkedNodes = [];
        for (var i = 0; i < treeview_filtros.length; i++) {
            checkedNodeIds(treeview_filtros[i].dataSource.view(), checkedNodes);
        }
        if (checkedNodes.length === 0) {
            //Si no selecciona nada
            alert("Seleccione al menos un filtro");
            return;
        }
        nodos = JSON.stringify(checkedNodes);
        $("#actualizar").css("background", "#333");
        $("#actualizar").text("Buscando");
        $("#actualizar").unbind("click");
        setTimeout(function() {
            $("#actualizar").click(actualizar_click);
            $("#actualizar").css("background", "#a6a6a6");
            $("#actualizar").text("Buscar");
        }, 1000);
        $("#posicion_anunciantes").css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0.0}, 500,
                function() {
                    $.ajax({
                        type: "POST",
                        url: "/anunciantes/ajax/rubros_table/1",
                        data: {rubros: nodos},
                        success: function(respuesta) {
                            $("#posicion_anunciantes").html(respuesta);
                                $("#posicion_anunciantes").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});
                                masonry();
                        }});
                        
                });
    };
    $("#actualizar").click(actualizar_click);

    getTree(function(tree) {
        treeview = $("#treeview").data("kendoTreeView");

        treeview_filtros = new Array();
        $(".treeview_filtros").each(function(index) {
            treeview_filtros.push($(this).data("kendoTreeView"));
        });
        var parsedTree = $.parseJSON(tree);

        var cant_col = ($(".treeview_filtros")).length;
        var total = parsedTree.length;
        var resto = (parsedTree.length % cant_col);
        var t_filtros = new Array();

        //Calculo cuantas van por columna y separo
        var cuantos_voy = 0;
        for (var i = 0; i < cant_col; i++) {
            if (resto > 0) {
                var end = (((total) / cant_col | 0) + 1);
                t_filtros[i] = parsedTree.slice(cuantos_voy, cuantos_voy + end);
                cuantos_voy += end;
                resto--;
            } else {
                var end = ((total) / cant_col | 0);
                t_filtros[i] = parsedTree.slice(cuantos_voy, cuantos_voy + end);
                cuantos_voy += end;
            }
        }

        if (treeview !== null) {
            treeview.setDataSource(new kendo.data.HierarchicalDataSource({
                data: parsedTree
            }));
            treeview.collapse(".k-item");
        }

        if (treeview_filtros !== null) {
            for (var i = 0; i < treeview_filtros.length; i++) {
                treeview_filtros[i].setDataSource(new kendo.data.HierarchicalDataSource({
                    data: t_filtros[i]
                }));
                treeview_filtros[i].collapse(".k-item");
            }
        }


        rubros_hidden = $("#rubros");
        if (rubros_hidden.val() !== "" && rubros_hidden.val() !== undefined) {
            var nodos = $.parseJSON($("#rubros").val());
            treeview = $("#treeview").data("kendoTreeView");
            for (i = 0; i < nodos.length; i++)
            {
                nodo = treeview.findByUid(treeview.dataSource.get(nodos[i]).uid);
                $(nodo).find(":checkbox").eq(0).trigger("click");
            }
        }

        $("#treeview :checkbox").click(function() {
            marcarNodos($(this));
        });

        //Vuelvo a mostrar todos los filtros
        setTimeout(function() {
            $("#filtros").toggle("");
        }, 750);
        $("#treeview").toggle();

    });

    function getTree(result) {
        $.get('/anunciantes/ajax/rubros_view/0', function(r) {
            result(r);
        });
    }

    function marcarNodos(nodoc) {
        checked = nodoc.prop("checked");
        if (checked)
        {
            padre = nodoc.closest('li').parent().closest('li').find(":checkbox").eq(0);
            if (padre.prop("checked") === false)
                padre.trigger("click");
        }

        if (!checked)
        {
            nodoc.closest('li').find(":checkbox").each(function(index) {
                if ($(this).prop("checked") === true) {
                    $(this).trigger("click");
                }
            });
        }
    }

    $("#botonconfrev").click(function() {
        checkedNodes = [];
        checkedNodeIds(treeview.dataSource.view(), checkedNodes);
        nodos = JSON.stringify(checkedNodes);
        $("#rubros").val(nodos);
    });


    //Agarro todos los nodos marcados
    function checkedNodeIds(nodes, checkedNodes) {
        for (var i = 0; i < nodes.length; i++) {
            if (nodes[i].checked) {
                checkedNodes.push(nodes[i].id);
            }
            if (nodes[i].hasChildren) {
                checkedNodeIds(nodes[i].children.view(), checkedNodes);
            }
        }
    }
});