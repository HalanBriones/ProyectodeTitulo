
function preciosProducto(){
    var precioPcosto = document.getElementById("precioPcosto").value;
    var preciomes = document.getElementById("preciomes").value;
    var mes = document.getElementById("meses").value;
    var margenNegocioPro = document.getElementById("margen_negocioPro").value;
    var margenVendedor = document.getElementById("margen_vendedorPro").value;
    
    var precioPventa = ((parseInt(margenNegocioPro)*parseInt(precioPcosto))/100)+parseInt(precioPcosto);
    var utilidad = parseInt(precioPventa)-parseInt(precioPcosto);


    document.getElementById("precioPventa").value = precioPventa;
    document.getElementById("utilidadPro").value = utilidad;
}

const input = document.getElementById('costoxhora');
const isValid = /^(\d+)$|^(\d+\.{1}\d{2})$/;
input.addEventListener('change', (event) => {
  event.preventDefault();
  let costoxhora = document.getElementById('costoxhora').value;
  if (!isValid.test(costoxhora)) {
    alert('Formato no válido')
  } else {
    console.log('Validación superada: ', costoxhora);
  }
});

function preciosServicio(){
    var costoxhora = document.getElementById("costoxhora").value;
    var cantidad_hora = document.getElementById("cantidad_hora").value;
    var margenNegocio = document.getElementById("margen_negocioSer").value;
    var margenVendedor = document.getElementById("margen_vendedorSer").value;


    var costoTotal = parseFloat(costoxhora)*parseFloat(cantidad_hora);
    var valor_cliente_hora = parseFloat(costoxhora)*(parseInt(margenNegocio)+1);
    var precioSventa = valor_cliente_hora*cantidad_hora;


    document.getElementById("costo_total").value = parseFloat(costoTotal);
    document.getElementById("valor_cliente_hora").value = valor_cliente_hora.toFixed(2);
    document.getElementById("precioSventa").value = precioSventa.toFixed(2);
}