function revision(idSolicitud){
    console.log(idSolicitud)

    let solicitud = {
        idsolicitud: idSolicitud
    }

    $.post("/solicitud/revision",solicitud, function (response) {
        console.log(response)
        if(response == 1){
            console.log('exito')
            $(location).attr('href',"/solicitudes")
        }else{
            console.log('fracaso')
            $(location).attr('href',"/solicitudes")
        }
    }).fail(function(error) { console.log(error.responseJSON) });

}