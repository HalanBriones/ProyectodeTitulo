function productos(){
  var res = document.getElementById("comercializacion").value;
  let separador = ","
  var cadena = res.split(separador,2)
  console.log(cadena[1])
  if(cadena[1] === 'Venta Transaccional'){
    var precioPcosto = document.getElementById("precioPcosto").value;
    var margenNegocioPro = document.getElementById("margen_negocioPro").value;
    var margenVendedor = document.getElementById("margen_vendedorPro").value;
    var cantidad_productos = document.getElementById("cantidad_productos").value;
    //calculo
    var precioPventa =  (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto));
    var utilidad = precioPventa - (parseFloat(precioPcosto));
    var ganancia = utilidad * (parseInt(margenVendedor)/100)
    //valores con mas de un producto
    var precioPventa_total = (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto))*cantidad_productos;
    var utilidadPro_total = (precioPventa_total - (parseFloat(precioPcosto)*cantidad_productos));
    var gananciaTotal_vendedor = (utilidadPro_total * (parseInt(margenVendedor)/100))

    document.getElementById("precioPventa").value = precioPventa.toFixed(2);
    document.getElementById("utilidadPro").value = utilidad.toFixed(2);
    document.getElementById("ganancia").value = ganancia.toFixed(2);
    document.getElementById("precioPventa_total").value = precioPventa_total.toFixed(2);
    document.getElementById("utilidadPro_total").value = utilidadPro_total.toFixed(2);
    document.getElementById("gananciaTotal_vendedor").value = gananciaTotal_vendedor.toFixed(2);
  }

  if(cadena[1] === 'Leasing A(arriendo)' || cadena[1] === 'Leasing B'){
    var precioPcosto = document.getElementById("precioPcosto").value;
    var margenNegocioPro = document.getElementById("margen_negocioPro").value;
    var margenVendedor = document.getElementById("margen_vendedorPro").value;
    var meses = document.getElementById("meses").value;
    var cantidad_productos = document.getElementById("cantidad_productos").value;

    var precioPventa = (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto))
    var utilidad = precioPventa - parseFloat(precioPcosto)
    var ganancia = utilidad * (parseInt(margenVendedor)/100)
    var mes = (precioPventa/parseInt(meses))
    //totales
    var precioPventa_total = (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto))*cantidad_productos;
    var utilidadPro_total = precioPventa_total - (parseFloat(precioPcosto)*cantidad_productos);
    var gananciaTotal_vendedor = (utilidadPro_total * (parseInt(margenVendedor)/100))
  
    document.getElementById("precioPventa").value = precioPventa.toFixed(2);
    document.getElementById("utilidadPro").value = utilidad.toFixed(2);
    document.getElementById("ganancia").value = ganancia.toFixed(2);
    document.getElementById("preciomes").value = mes.toFixed(2);
    //inputs type hidden
    document.getElementById("precioPventa_total").value = precioPventa_total.toFixed(2);
    document.getElementById("utilidadPro_total").value = utilidadPro_total.toFixed(2);
    document.getElementById("gananciaTotal_vendedor").value = gananciaTotal_vendedor.toFixed(2);
  }

  if(cadena[1] === 'Suscripcion'){
    var precioPcosto = document.getElementById("precioPcosto").value;
    var margenNegocioPro = document.getElementById("margen_negocioPro").value;
    var margenVendedor = document.getElementById("margen_vendedorPro").value;
    var meses = document.getElementById("meses").value;
    var cantidad_productos = document.getElementById("cantidad_productos").value;

    var precioPventa = (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto))
    var utilidad = precioPventa - parseFloat(precioPcosto)
    var ganancia = utilidad * (parseInt(margenVendedor)/100)
    //totales
    var precioPventa_total = (parseFloat(precioPcosto)*(parseInt(margenNegocioPro)/100)+parseFloat(precioPcosto))*cantidad_productos;
    var utilidadPro_total = (precioPventa_total - (parseFloat(precioPcosto)*cantidad_productos));
    var gananciaTotal_vendedor = (utilidadPro_total * (parseInt(margenVendedor)/100))*cantidad_productos

    document.getElementById("precioPventa").value = precioPventa.toFixed(2);
    document.getElementById("utilidadPro").value = utilidad.toFixed(2);
    document.getElementById("ganancia").value = ganancia.toFixed(2);
    //inputs type hidden
    document.getElementById("precioPventa_total").value = precioPventa_total.toFixed(2);
    document.getElementById("utilidadPro_total").value = utilidadPro_total.toFixed(2);
    document.getElementById("gananciaTotal_vendedor").value = gananciaTotal_vendedor.toFixed(2);
  } 
}

function servicios(){
  var comercializacionservicio = document.getElementById("comercializacionservicio").value
  var separador = ","
  var cadena = comercializacionservicio.split(separador,2)

  if(cadena[1] != "Seleccione Comercializacion"){
    if(cadena[1] === "Outsourcing" || cadena[1] === "Bolsa de Horas"){
      console.log('outsourcing')
      var costoxhora = document.getElementById("costoxhora").value;
      var cantidad_hora = document.getElementById("cantidad_hora").value;
      var margenNegocio = document.getElementById("margen_negocioSer").value;
      var margenVendedor = document.getElementById("margen_vendedorSer").value;
      var n_meses = document.getElementById("n_meses").value;
      var valor_uf = document.getElementById("valor_uf").value;
    
      var costo_total = parseFloat(costoxhora)*parseInt(cantidad_hora);
      var valor_cliente_hora = ((parseFloat(costoxhora)*parseInt(margenNegocio))/100)+parseFloat(costoxhora);
      var precioSventa = valor_cliente_hora*parseInt(cantidad_hora);
      var utilidadSer= precioSventa-costo_total;
      var costo_total_mes = parseFloat(costo_total)/parseInt(n_meses)
      var gananciaSer = (utilidadSer*parseInt(margenVendedor))/100;
      var valor_venta_mes = precioSventa/parseInt(n_meses);
      var ganancia_vendedorSer_clp = Math.round(gananciaSer*parseFloat(valor_uf)); 
      var costo_totalSer_clp = Math.round(costo_total*parseFloat(valor_uf));
      var costo_total_mes_clp = Math.round(costo_total_mes*parseFloat(valor_uf));
      var valor_total_cliente_clp = Math.round(precioSventa*parseFloat(valor_uf));

      document.getElementById("costo_total").value= new Intl.NumberFormat('es-ES').format(costo_total.toFixed(2));
      document.getElementById("valor_cliente_hora").value = valor_cliente_hora.toFixed(2);
      document.getElementById("precioSventa").value= precioSventa.toFixed(2);
      document.getElementById("utilidadSer").value = utilidadSer.toFixed(2);
      document.getElementById("costo_total_mes").value = costo_total_mes.toFixed(2);
      document.getElementById("gananciaSer").value = gananciaSer.toFixed(2);
      document.getElementById("valor_venta_mes").value = valor_venta_mes.toFixed(2);
      document.getElementById("ganancia_vendedorSer_clp").value = ganancia_vendedorSer_clp
      document.getElementById("costo_totalSer_clp").value = costo_totalSer_clp
      document.getElementById("costo_total_mes_clp").value = costo_total_mes_clp
      document.getElementById("valor_total_cliente_clp").value = valor_total_cliente_clp
      
    }
  }

}