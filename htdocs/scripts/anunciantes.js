$(window).load(function() {
    masonry();
    window.onresize = function() {
        masonry();
    };
});

function masonry() {
    var $container = $('#tabla');
    // initialize
    $container.masonry({
        singleMode: true,
        columnWidth: 0,
        itemSelector: '.anunciante',
        transitionDuration: 0,
        isFitWidth: true,
        isRTL: false
    });
    $(".anunciante").each(function() {
        $(this).css({left: $(this).position().left - 1 - Math.ceil($(this).position().left / 256)});
    });

}

$(document).ready(function() {

    $("#treeview").kendoTreeView({
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

    getTree(function(tree) {
        treeview = $("#treeview").data("kendoTreeView");
        parsedTree = $.parseJSON(tree);
        treeview.setDataSource(new kendo.data.HierarchicalDataSource({
            data: parsedTree
        }));


        if ($("#rubros").val() !== "") {
            var nodos = $.parseJSON($("#rubros").val());

            treeview = $("#treeview").data("kendoTreeView");

            for (i = 0; i < nodos.length; i++)
            {
                console.log(nodos[i]);
                nodo = treeview.findByUid(treeview.dataSource.get(nodos[i]).uid);
                $(nodo).find(":checkbox").eq(0).trigger("click");
            }
        }

        $("#treeview :checkbox").click(function() {
            nodo = $(this);
            checked = nodo.prop("checked");
            if (checked)
            {
                padre = nodo.closest('li').parent().closest('li').find(":checkbox").eq(0);
                if (padre.prop("checked") === false)
                    padre.trigger("click");
            }

            if (!checked)
            {
                
                nodo.closest('li').find(":checkbox").each(function(index) {
                    if ($(this).prop("checked") === true) {
                        $(this).trigger("click");
                    }
                });
            }
        });
    });

    $("#botonconfrev").click(function() {
        treeview = $("#treeview").data("kendoTreeView");
        checkedNodes = [];
        checkedNodeIds(treeview.dataSource.view(), checkedNodes);
        console.log(checkedNodes);
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