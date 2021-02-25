
var link = window.location
var User = document.getElementById("User");
var Pro = document.getElementById("Pro");
var Ser = document.getElementById("Ser");
var Op = document.getElementById("Op")

var verUser = document.getElementById("verUser");
var registerUser = document.getElementById("registerUser");
var verPro = document.getElementById("verPro");
var verMac = document.getElementById("verMac");
var verComerPro = document.getElementById("verComerPro");
var verTP = document.getElementById("verTP");
var verSer = document.getElementById("verSer");
var verConoc = document.getElementById("verConoc");
var verComerSer = document.getElementById("verComerSer");
var verSol = document.getElementById("verSol");
var verOP = document.getElementById("verOP");
var verEstado = document.getElementById("verEstado");

const servidor = `http://127.0.0.1:8000/`

if(link.href === `${servidor}registro`){
    registerUser.className += " active"
    User.className += "active"
}
if(link.href === `${servidor}mostrar`){
    verUser.className += " active"
    User.className += "active"
}

if(link.href === `${servidor}productos`){
    verPro.className += " active"
    Pro.className += "active"
}
if(link.href === `${servidor}servicios`){
    verSer.className += " active"
    Ser.className += "active"
}
if(link.href === `${servidor}solicitudes`){
    verSol.className += " active"
}
if(link.href === `${servidor}verNegocios`){
    verOP.className += " active"
    Op.className += "active"
}
if(link.href === `${servidor}marcas/view`){
    verMac.className += " active"
    Pro.className += "active"
}
if(link.href === `${servidor}comercializaciones`){
    verComerPro.className += " active"
    Pro.className += "active"
}
if(link.href === `${servidor}tipo-productos`){
    verTP.className += " active"
    Pro.className += "active"
}
if(link.href === `${servidor}conocimientos`){
    verEstado.className += " active"
    Ser.className += "active"
}
if(link.href === `${servidor}comercializaciones-ser`){
    verComerSer.className += " active"
    Ser.className += "active"
}
if(link.href === `${servidor}estados`){
    verComerSer.className += " active"
    Op.className += "active"
}