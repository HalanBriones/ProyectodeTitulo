// $(".nav-sidebar").on("click", ".nav-link", function(e) {
//     e.preventDefault()
//     $(".nav-link").removeClass("active");
//     $(this).addClass("active");
//   });

var link = window.location
var usuario1 = document.getElementById("barra1");
var usuario2 = document.getElementById("barra2");
var usuario3 = document.getElementById("barra3");
var usuario4 = document.getElementById("barra4");
var usuario5 = document.getElementById("barra5");
var usuario6 = document.getElementById("barra6");

const servidor = `http://127.0.0.1:8000/`
console.log(link.href)
if(link.href === `${servidor}inicio`){
}

if(link.href === `${servidor}registro`){
    usuario1.className += " active"
}

if(link.href === `${servidor}mostrar`){
    usuario2.className += " active"
}

if(link.href === `${servidor}productos`){
    usuario3.className += " active"
}

if(link.href === `${servidor}servicios`){
    usuario4.className += " active"
}
if(link.href === `${servidor}solicitudes`){
    usuario5.className += " active"
}
if(link.href === `${servidor}verNegocios`){
    usuario6.className += " active"
}
