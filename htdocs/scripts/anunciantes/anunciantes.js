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
