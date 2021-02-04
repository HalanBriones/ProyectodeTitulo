//cambio de modelo a version segun tipo producto
document.getElementById('tipo_producto').addEventListener('change',(event)=>{
    var tipo_producto = document.getElementById("tipo_producto").value;
    var separador = ",";
    var res = tipo_producto.split(separador,2)
    if(res[1] === "Hardware"){
      console.log('hw');
      document.getElementById('div-version').style.display = 'none';
      document.getElementById('div-modelo').style.display = 'flex';
    }

    if(res[1] === "Software"){
      console.log('sw');
      document.getElementById('div-modelo').style.display = 'none';
      document.getElementById('div-version').style.display = 'flex';
    }
  });