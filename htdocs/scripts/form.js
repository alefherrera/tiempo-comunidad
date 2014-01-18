$(function() {
    var formulario = $('#formulario');
    if (!$('#formulario .error').text() > 0)
        formulario.css("display","none");
    $('#nueva').mouseup(function() {
        formulario.slideToggle("slow", function() {
            $(document).scrollTop($("#nueva").offset().top);
        });
    });
});