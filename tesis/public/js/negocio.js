var arrayProducto = [];

function borrar(i){
    console.log(i)
    event.preventDefault()
    arrayProducto = arrayProducto.splice(i-1,1)

    let res = "";
    var j = 0;
    arrayProducto.forEach(elemento => {
        j=j+1;
        res = res+"<tr>"+
        "<td>"+elemento.producto_nombre+"</td>"+
            "<td>"+elemento.comercializacionproducto_nombre+"</td>"+
            "<td>"+elemento.precioPcosto+"</td>"+
            "<td>"+elemento.precioPventa+"</td>"+
            "<td><button class='btn-sm btn-dark' onclick='borrar("+i+")'>x</button></td>"+
        "</tr>"    
    })
    document.getElementById("+pro").innerHTML = res
}

function insertPro(){
    event.preventDefault();
    //producto
    var producto = document.getElementById("producto").value;
    var separador = ",";
    var cadena_pro = producto.split(separador,2);
    var comercializacionproducto = document.getElementById("comercializacionproducto").value;
    var cadena_comer = comercializacionproducto.split(separador)
    var precioPcosto = document.getElementById("precioPcosto").value;
    var margen_negocioPro = document.getElementById("margen_negocioPro").value;
    var precioPventa = document.getElementById("precioPventa").value;
    var utilidadPro = document.getElementById("utilidadPro").value;
    var precioxmes = document.getElementById("preciomes").value;
    var meses = document.getElementById("meses").value;
    var ganancia_vendedor = document.getElementById("ganancia").value;
    var margen_vendedorPro = document.getElementById("margen_vendedorPro").value;
    var configuracion = document.getElementById("configuracion").value;
    var cantidad_productos = document.getElementById("cantidad_productos").value;
    let productos = {
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
        cantidad_productos:cantidad_productos,
        precioxmes: precioxmes,
        numero_meses: meses,
        ganancia_vendedor: ganancia_vendedor
    }
    arrayProducto.push(productos)
    let res = "";
    var i = 0;
    arrayProducto.forEach(elemento => {
        i=i+1;
        res = res+"<tr>"+
        "<td>"+elemento.producto_nombre+"</td>"+
            "<td>"+elemento.comercializacionproducto_nombre+"</td>"+
            "<td>"+elemento.precioPcosto+"</td>"+
            "<td>"+elemento.precioPventa+"</td>"+
            "<td><button class='btn-sm btn-dark' onclick='borrar("+i+")'>x</button></td>"+
        "</tr>"    
    })
    document.getElementById("+pro").innerHTML = res
}

var arrayServicio = [];
function borrarSer(l){
    console.log(l)
    event.preventDefault()
    arrayServicio = arrayServicio.splice(l-1,1)
    console.log(arrayServicio)
    let res = "";
    var k = 0;
    arrayServicio.forEach(elemento => {
        k=k+1;
        res = res+"<tr>"+
            "<td>"+elemento.servicio+"</td>"+
            "<td>"+elemento.comercializacionservicio_nombre+"</td>"+
            "<td>"+elemento.conocimiento_nombre+"</td>"+
            "<td>"+elemento.precioSventa+"</td>"+
            "<td><button class='btn-sm btn-dark' onclick='borrarSer("+l+")'>x</button></td>"+
        "</tr>"      
    })
    document.getElementById("+ser").innerHTML = res
}

function insertSer(){
    event.preventDefault();
    //servicio
    var servicio = document.getElementById("servicio").value;
    var conocimiento = document.getElementById("conocimiento").value;
    var separador = ","
    var cadena_ser = servicio.split(separador,2);
    var cadena_conoc = conocimiento.split(separador,2);
    var comercializacionservicio = document.getElementById("comercializacionservicio").value;
    var cadena_comer = comercializacionservicio.split(separador,2);
    var costoxhora = document.getElementById("costoxhora").value;
    var cantidad_hora = document.getElementById("cantidad_hora").value;
    var costo_total = document.getElementById("costo_total").value;
    var margen_negocioSer = document.getElementById("margen_negocioSer").value;
    var precioSventa = document.getElementById("precioSventa").value;
    var utilidadSer = document.getElementById("utilidadSer").value;
    var margen_vendedorSer = document.getElementById("margen_vendedorSer").value;
    var comentario = document.getElementById("comentario").value;
    var meses = document.getElementById("n_meses").value;
    var costo_total_mes = document.getElementById("costo_total_mes").value;
    var valor_cliente_hora = document.getElementById("valor_cliente_hora").value;
    var valor_venta_mes = document.getElementById("valor_venta_mes").value;
    var ganancia_vendedorSer_clp = document.getElementById("ganancia_vendedorSer_clp").value;
    var costo_totalSer_clp = document.getElementById("costo_totalSer_clp").value;
    var costo_total_mes_clp = document.getElementById("costo_total_mes_clp").value;

    let servicios = {
        servicio:cadena_ser[1],
        servicio_id: cadena_ser[0],
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
        comentario: comentario,
        meses: meses,
        valor_venta_mes:valor_venta_mes,
        ganancia_vendedorSer_clp:ganancia_vendedorSer_clp,
        costo_totalSer_clp:costo_totalSer_clp,
        costo_total_mes:costo_total_mes,
        costo_total_mes_clp:costo_total_mes_clp,
        valor_cliente_hora: valor_cliente_hora
    }
    var l = 0;
    let res="";
    arrayServicio.push(servicios)// me envia los datos a la pantalla y se pierden 
    arrayServicio.forEach(elemento => {
        l = l+1;
        res = res+"<tr>"+
            "<td>"+elemento.servicio+"</td>"+
            "<td>"+elemento.comercializacionservicio_nombre+"</td>"+
            "<td>"+elemento.conocimiento_nombre+"</td>"+
            "<td>"+elemento.precioSventa+"</td>"+
            "<td><button class='btn-sm btn-dark' onclick='borrarSer("+l+")'>x</button></td>"+
        "</tr>"    
    })
    document.getElementById("+ser").innerHTML = res
}

function enviar(selected){
    
    var idNegocio = document.getElementById("idnegocio").value;
    var nombre_negocio = document.getElementById("nombre_negocio").value;
    var descripcion_negocio = document.getElementById("descripcion_negocio").value;
    var estado_negocio = document.getElementById("estado_negocio").value;
    var rut_creador = document.getElementById("rut_creador").value;

    var negocio = [
        idNegocio,
        nombre_negocio,
        descripcion_negocio,
        estado_negocio,
        rut_creador
    ];
    
    var data = {
        productos: arrayProducto,
        servicios: arrayServicio,
        participantes:selected,
        negocio: negocio
    }
    $.post("/negocios",data, function (response) {
        console.log(response)
        if(response == 1){
            //error al guardar los datos en la fase 2
            $(location).attr('href',"/negocio-fase2")
        }else{
            //fase 2 completada
            $(location).attr('href',"/negocio-fase3")
        }
     }).fail(function(error) { console.log(error.responseJSON) });
}

function añadir(){
    var idNegocio = document.getElementById("idnegocio").value;
    var nombre_negocio = document.getElementById("nombre_negocio").value;
    var descripcion_negocio = document.getElementById("descripcion_negocio").value;
    var estado_negocio = document.getElementById("estado_negocio").value;
    var rut_creador = document.getElementById("rut_creador").value;
    
    var negocio = [
        idNegocio,
        nombre_negocio,
        descripcion_negocio,
        estado_negocio,
        rut_creador
    ];
    
    var data = {
        productos: arrayProducto,
        servicios: arrayServicio,
        participantes:selected,
        negocio: negocio
    }

    if(data['servicios']==""){
        console.log('servicio vacio');
        $.post("/añadirP",data, function (response) {
         console.log(response)
         $(location).attr('href',"/verNegocios")
        }).fail(function(error) { console.log(error.responseJSON) });
    }

    if(data['productos']==""){
        console.log('producto vacio');
        $.post("/añadirS",data, function (response) {
            console.log(response)
            $(location).attr('href',"/verNegocios")
           }).fail(function(error) { console.log(error.responseJSON) });
    }
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

$('#btnAñadir').click(function(){
    añadir();
})
