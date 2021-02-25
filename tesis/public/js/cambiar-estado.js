let negocioEstado ;
function estado(negocio){
    negocioEstado = {...negocio}
    console.log(negocioEstado)
}

var value;
function cambio(){
    value = document.getElementById("cambiar_estado").value ;
}

$('#guardar').click(function () {
    var data = {
        negocio: negocioEstado['idNegocio'],
        estado: value
    }
    console.log(data)
    $.post("/cambiar/estado",data, function (response) {
        if(response == 1){
            console.log('exito')
            $(location).attr('href',"/verNegocios")
        }else{
            console.log('fracaso')
            $(location).attr('href',"/verNegocios")
        }
    }).fail(function(error) { console.log(error.responseJSON) });
});