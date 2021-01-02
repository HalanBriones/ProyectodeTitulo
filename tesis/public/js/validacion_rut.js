var rut = document.getElementById('rut');
var boton = document.getElementById('boton');
boton.disabled = true;

rut.onkeyup = function() {
    var rutC = rut.value;

    rutC = rutC.replace(/[.-]+/g, '');
    let b = rutChileno(rutC, rutC.length);

    if (b) {
        rut.className = 'form-control has-feedback-left is-valid'
        boton.disabled = false;
    }else{
        rut.className = 'form-control has-feedback-left is-invalid'
        boton.disabled = true;
    }
}

var rut2 = document.getElementById('rut2');
var boton2 = document.getElementById('boton2');
boton2.disabled = true;

rut2.onkeyup = function() {
    var rutC = rut2.value;

    rutC = rutC.replace(/[.-]+/g, '');
    let b = rutChileno(rutC, rutC.length);

    if (b) {
        rut2.className = 'form-control has-feedback-left is-valid'
        boton2.disabled = false;
    }else{
        rut2.className = 'form-control has-feedback-left is-invalid'
        boton2.disabled = true;
    }
}

function rutChileno(rut, largo) {
    let verificador = rut[largo - 1];
    let la = Number(largo - 2);
    let respuesta;
    let j = 2;
    let suma = 0;
    for (let i = la; i >= 0; i--) {
        if (j == 7) {
            suma = suma + rut[i] * j;
            j = 2;
        } else {
            suma = suma + rut[i] * j;
            j = j + 1;
        }
    }

    suma = suma % 11;

    suma = 11 - suma;

    if (largo > 7) {
        if (suma == verificador) {
            respuesta = true;
        } else {
            if (suma == 10 && (verificador == 'k' || verificador == 'K')) {
                respuesta = true;
            } else {
                if (suma == 11 && verificador == 0) {
                    respuesta = true;
                } else {
                    respuesta = false;
                }
            }
        }
    } else {
        respuesta = false;
    }

    return respuesta;
}
