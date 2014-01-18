
$(document).ready(function() {

    $("#treeview").kendoTreeView({
        checkboxes: {
        },
        select: function(e) {
            e.preventDefault();
            nodo = $(e.node).find(":checkbox").eq(0);
            nodo.trigger("click");
        }
    });
    $("#treeview_filtro").kendoTreeView({
        checkboxes: {
        },
        select: function(e) {
            e.preventDefault();
            nodo = $(e.node).find(":checkbox").eq(0);
            nodo.trigger("click");
            checked = nodo.prop("checked");
            if (checked)
            {
                padre = $(e.node).closest('li').parent().closest('li').find(":checkbox").eq(0);
                if (padre.prop("checked") === false)
                    padre.trigger("click");
            }

            if (!checked)
            {
                $(e.node).find(":checkbox").each(function(index) {
                    if ($(this).prop("checked") === true) {
                        $(this).trigger("click");
                    }
                });
            }
        }
    });
    //Timeout y filtro de tabla
    var actualizar_click = function(e) {
        treeview = $("#treeview_filtro").data("kendoTreeView");
        checkedNodes = [];
        checkedNodeIds(treeview.dataSource.view(), checkedNodes);
        nodos = JSON.stringify(checkedNodes);
        $("#actualizar").css("background", "red");
        setTimeout(function() {
            $("#actualizar").click(actualizar_click);
            $("#actualizar").css("background", "green");
        }, 2000);
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
                        }
                    });
                });
    };
    $("#actualizar").click(actualizar_click);
    getTree(function(tree) {
        treeview = $("#treeview").data("kendoTreeView");
        treeview_filtro = $("#treeview_filtro").data("kendoTreeView");
        parsedTree = $.parseJSON(tree);
        if (treeview !== null)
            treeview.setDataSource(new kendo.data.HierarchicalDataSource({
                data: parsedTree
            }));
        if (treeview_filtro !== null)
            treeview_filtro.setDataSource(new kendo.data.HierarchicalDataSource({
                data: parsedTree
            }));
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
        $("#treeview_filtro :checkbox").click(function() {
            marcarNodos($(this));
        });
    });
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
        treeview = $("#treeview").data("kendoTreeView");
        checkedNodes = [];
        checkedNodeIds(treeview.dataSource.view(), checkedNodes);
        nodos = JSON.stringify(checkedNodes);
        $("#rubros").val(nodos);
        console.log(nodos);
    });
    function getTree(result) {
        $.get('/anunciantes/ajax/rubros_view/0', function(r) {
            result(r);
        });
    }

// function that gathers IDs of checked nodes
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