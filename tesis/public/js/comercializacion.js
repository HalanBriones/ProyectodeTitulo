$('#producto').change(function (event) {
    var separador = " ";
    var cadena = event.target.value.split(separador);
     $.get("/comercializaciones/"+cadena[0]+"", function (response,comercializacion){
            response.forEach(comercializacion => {
             $('#comercializacionproducto').append('<option name"option" id="option" value="'+comercializacion.idcomercializacion_producto+','+comercializacion.nombre_comercializacion+'">'+comercializacion.nombre_comercializacion+'</option>')
        })
    });
});


