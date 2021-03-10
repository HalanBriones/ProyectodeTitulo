
$('#graficar').click(function(){
    var producto = [];
    var veces = [];
    var años;
    let fecha = document.getElementById("ano").value
    años = {fecha: fecha};
    console.log(años)
         $.post("/graficos/datos",años,function (response) {
            document.getElementById("myChart").remove()
            var canvas = document.createElement("canvas");
            canvas.id = "myChart"; 
            document.getElementById("padre").appendChild(canvas);
         var ctx = document.getElementById('myChart').getContext('2d'); 
         if(fecha == ""){
             var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
             labels: [],
             datasets: [{
                 label: 'Productos Cotizados en el año',
                 data: [] ,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
             },
             options: {
                 scales: {
                     yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                     }]
                 }
             }
             });
             console.log('sin fecha')
         }else{
             console.log('con fecha')
             for(var i=0;i< response.length;i++){
                 producto.push(response[i]['producto'])
                 veces.push(response[i]['cantidad'])
             }
             var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
             labels: producto,
             datasets: [{
                 label: '# of Votes',
                 data: veces ,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
             },
             options: {
                 scales: {
                 }
             }
             });

         }
     }).fail(function(error) { console.log(error.responseJSON) });
});

$('#graficar2').click(function(){
    var servicio = [];
    var veces = [];
    var años;
    let fecha = document.getElementById("ano_servicio").value
    años = {fecha: fecha};
    console.log(años)
         $.post("/graficos/datos/servicios",años,function (response) {
            console.log(response)
            document.getElementById("myChart2").remove()
            var canvas = document.createElement("canvas");
            canvas.id = "myChart2"; 
            document.getElementById("padre2").appendChild(canvas);
         var ctx = document.getElementById('myChart2').getContext('2d'); 
         if(fecha == ""){
             var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
             labels: [],
             datasets: [{
                 label: 'Servicios Cotizados en el año',
                 data: [] ,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
             },
             options: {
                 scales: {
                     yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                     }]
                 }
             }
             });
             console.log('sin fecha')
         }else{
             console.log('con fecha')
             for(var i=0;i< response.length;i++){
                 servicio.push(response[i]['servicio'])
                 veces.push(response[i]['cantidad'])
             }
             var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
             labels: servicio,
             datasets: [{
                 label: '# of Votes',
                 data: veces ,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
             },
             options: {
                 scales: {
                 }
             }
             });

         }
     }).fail(function(error) { console.log(error.responseJSON) });
});