
 $(function(){
    $('#ocultadescripcion').click(function(){
        $(this).parent().find('#disparador').slideToggle("slow");
    });
});

$(function(){
    $('#ocultavalorar').click(function(){
        $(this).parent().find('#ocultavalorarhijo').slideToggle("slow");
        $(this).parent().find('#votaciones').slideToggle("slow");
    });
});

$(function(){
    $('#ocultacomentarios').click(function(){
        $(this).parent().find('#comentarius').slideToggle("slow");
        
    });
});