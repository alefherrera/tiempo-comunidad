$(document).ready(function() {
    $("#treeview").kendoTreeView({
        select: function(e) {
            e.preventDefault();
        }
    });
    getTree(function(tree) {
        treeview = $("#treeview").data("kendoTreeView");
        parsedTree = $.parseJSON(tree);
        if (treeview !== null)
            treeview.setDataSource(new kendo.data.HierarchicalDataSource({
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
    });

    function getTree(result) {
        $.get('/anunciantes/ajax/rubros_view/19', function(r) {
            result(r);
        });
    }


});