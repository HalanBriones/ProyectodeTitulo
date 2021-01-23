var arrayProducto = [];
function insertPro(){
    event.preventDefault();
    var nombre_negocio = document.getElementById("nombre_negocio").value;
    var descripcion = document.getElementById("descripcion").value;
    //producto
    var producto = document.getElementById("producto").value;
    var separador = " ";
    var cadena_pro = producto.split(separador);
    var comercializacionproducto = document.getElementById("comercializacionproducto").value;
    var cadena_comer = comercializacionproducto.split(separador)
    var precioPcosto = document.getElementById("precioPcosto").value;
    var margen_negocioPro = document.getElementById("margen_negocioPro").value;
    var precioPventa = document.getElementById("precioPventa").value;
    var utilidadPro = document.getElementById("utilidadPro").value;
    var margen_vendedorPro = document.getElementById("margen_vendedorPro").value;
    var configuracion = document.getElementById("configuracion").value;


        let productos = {
            nombre_negocio: nombre_negocio,
            descripcion : descripcion,
            producto_id: cadena_pro[0],
            producto_nombre: cadena_pro[1],
            comercializacionproducto_nombre: cadena_comer[1],
            comercializacionproducto_id: cadena_comer[0],
            precioPcosto: precioPcosto,
            margen_negocioPro: margen_negocioPro,
            precioPventa: precioPventa,
            utilidadPro: utilidadPro,
            margen_vendedorPro: margen_vendedorPro,
            configuracion: configuracion,
        }


        arrayProducto.push(productos)

        let res = "";
        arrayProducto.forEach(elemento => {
            res = res+"<tr>"+
            "<td>"+elemento.producto_nombre+"</td>"+
                "<td>"+elemento.comercializacionproducto_nombre+"</td>"+
                "<td>"+elemento.precioPcosto+"</td>"+
                "<td>"+elemento.precioPventa+"</td>"+
            "</tr>"    
        })
        document.getElementById("+pro").innerHTML = res

}

var arrayServicio = [];
function insertSer(){
    event.preventDefault();
    //servicio
    var servicio = document.getElementById("servicio").value;
    var conocimiento = document.getElementById("conocimiento").value;
    var separador = " "
    var cadena_conoc = conocimiento.split(separador);
    var comercializacionservicio = document.getElementById("comercializacionservicio").value;
    var cadena_comer = comercializacionservicio.split(separador);

    var costoxhora = document.getElementById("costoxhora").value;
    var cantidad_hora = document.getElementById("cantidad_hora").value;
    var costo_total = document.getElementById("costo_total").value;
    var margen_negocioSer = document.getElementById("margen_negocioSer").value;
    var precioSventa = document.getElementById("precioSventa").value;
    var utilidadSer = document.getElementById("utilidadSer").value;
    var margen_vendedorSer = document.getElementById("margen_vendedorSer").value;
    var comentario = document.getElementById("comentario").value;

    let servicios = {
        servicio:servicio,
        conocimiento_nombre: cadena_conoc[1],
        conocimiento_id: cadena_conoc[0],
        comercializacionservicio_nombre: cadena_comer[1],
        comercializacionservicio_id: cadena_comer[0],
        costoxhora: costoxhora,
        cantidad_hora:cantidad_hora,
        costo_total: costo_total,
        margen_negocioSer:margen_negocioSer,
        precioSventa:precioSventa,
        utilidadSer: utilidadSer,
        margen_vendedorSer:margen_vendedorSer,
        comentario: comentario
    }
    let res="";
    arrayServicio.push(servicios)// me envia los datos a la pantalla y se pierden 
    arrayServicio.forEach(elemento => {
        res = res+"<tr>"+
            "<td>"+elemento.servicio+"</td>"+
            "<td>"+elemento.comercializacionservicio_nombre+"</td>"+
            "<td>"+elemento.conocimiento_nombre+"</td>"+
            "<td>"+elemento.precioSventa+"</td>"+
        "</tr>"    
    })
    document.getElementById("+ser").innerHTML = res
}

function enviar(selected){
    var data = {
        productos: arrayProducto,
        servicios: arrayServicio,
        participantes:selected
    }
    $.post("/negocios",data, function (response) {
        console.log(response)
        //confirmacion de guardado exitoso
    });
    
}

var selected = [];
$('#btnEnviar').click(function(){  
    $('input[type=checkbox]').each(function(){
        if (this.checked) {
            selected.push ($(this).val());
        }
    });
    enviar(selected);
});    



