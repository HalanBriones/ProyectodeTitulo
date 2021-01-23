$("#barra1").on("click",function(){

});

$(function(){

    var menu = $(".nav a");

    menu.click(function(){
        menu.removeClass("active");

        $(this).addClass("active")
    })
})