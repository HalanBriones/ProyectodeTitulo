function confirmDelete(idproducto) {
    event.preventDefault();
    var producto = {
        idproducto : idproducto
    }
    console.log(idproducto)
    Swal.fire({
        title: '¿Esta seguro?',
        text: 'Eliminaras este registro',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'No, no eliminar'
      }).then((result) => {
        if (result.value) {
            $.post("/producto",producto, function (response) {
                console.log(response)
                if(response == 0){
                    Swal.fire(
                        'Eliminado',
                        'El registro a sido eliminado',
                        'success'
                    )
                    $(location).attr('href',"/productos")
                }
             }).fail(function(error) { console.log(error.responseJSON) });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            'Cancelado',
            'El registro no se a eliminado',
            'error'
          )
        }
      }) 
}

function delete_comer(idcomercializacion) {
  event.preventDefault();
  console.log( 'comer',idcomercializacion)
  var comercializacion = {
      idcomercializacion : idcomercializacion
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta comercialización',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/comerPro",comercializacion, function (response) {
              console.log(response)
              if(response == 0){
                  Swal.fire(
                      'Eliminado',
                      'La comercialización a sido eliminada',
                      'success'
                  )
                  $(location).attr('href',"/comercializaciones")
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'La comercializacion no se a eliminado',
          'error'
        )
      }
    }) 
}   

function delete_comerSer(idcomercializacion) {
  event.preventDefault();
  console.log( 'comer',idcomercializacion)
  var comercializacion = {
      idcomercializacion : idcomercializacion
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta comercialización',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/comerSer",comercializacion, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/comercializaciones-ser")
                  Swal.fire(
                      'Eliminado',
                      'La comercialización a sido eliminada',
                      'success'
                  )

              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'La comercializacion no se a eliminado',
          'error'
        )
      }
    }) 
}

function delete_conocimiento(idconocimiento) {
  event.preventDefault();
  console.log( 'cono',idconocimiento)
  var conocimiento = {
      idconocimiento : idconocimiento
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta conocimiento',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/conocimiento",conocimiento, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/conocimientos")
                  Swal.fire(
                      'Eliminado',
                      'El conocimiento a sido eliminado',
                      'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El conocimiento no se a eliminado',
          'error'
        )
      }
    }) 
}

function delete_estado(idEstado) {
  event.preventDefault();
  console.log( 'cono',idEstado)
  var estado = {
      idestado : idEstado
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta conocimiento',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/estado",estado, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/estados")
                  Swal.fire(
                    'Eliminado',
                    'El estado a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El estado no se a eliminado',
          'error'
        )
      }
    }) 
}   


function delete_marca(idMac) {
  event.preventDefault();
  console.log( 'cono',idMac)
  var marca = {
      idmarca : idMac
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta conocimiento',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/marca",marca, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/marcas/view")
                  Swal.fire(
                    'Eliminado',
                    'El estado a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El estado no se a eliminado',
          'error'
        )
      }
    }) 
}

function delete_servicio(idservicio) {
  event.preventDefault();
  console.log( 'cono',idservicio)
  var servicio = {
    idservicio : idservicio
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta servicio',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/servicio",servicio, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/servicios")
                  Swal.fire(
                    'Eliminado',
                    'El servicio a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El servicio no se a eliminado',
          'error'
        )
      }
    }) 
}

function delete_tipo_producto(idtipo_producto) {
  event.preventDefault();
  console.log( 'cono',idtipo_producto)
  var tipoproducto = {
    idtipo_producto : idtipo_producto
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras esta tipo de producto',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/tipo/producto",tipoproducto, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/tipo-productos")
                  Swal.fire(
                    'Eliminado',
                    'El Tipo Producto a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El Tipo Producto no se a eliminado',
          'error'
        )
      }
    }) 
}

function delete_user(rut) {
  event.preventDefault();
  console.log( 'cono',rut)
  var usuario = {
    rut : rut
  }
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras este Usuario',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/delete/usuario",usuario, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/mostrar")
                  Swal.fire(
                    'Eliminado',
                    'El Usuario a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El Usuario no se a eliminado',
          'error'
        )
      }
    }) 
}

function deleteParticipante(rut,idNegocio){
  event.preventDefault();
  console.log(rut)
  console.log(idNegocio)
  var participante = {
    rut : rut,
    idNegocio: idNegocio
  }
  console.log(participante)
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras este Participante',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/eliminar/participante",participante, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/verParAsoc/"+participante['idNegocio']+"")
                  Swal.fire(
                    'Eliminado',
                    'El Usuario a sido eliminado',
                    'success'
                  )
              }
              if(response == -1){
                Swal.fire(
                  'No se pudo eliminar',
                  'El Participante es el creador de la Oportunidad de Negocio',
                  'error'
                )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El Usuario no se a eliminado',
          'error'
        )
      }
    })
}

function deleteProducto(id_pro_has_op,idNegocio){
  event.preventDefault();
  var producto = {
    id_pro_has_op : id_pro_has_op,
  }
  console.log(producto)
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras este Producto',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/eliminar/producto",producto, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/verProAsoc/"+idNegocio+"")
                  Swal.fire(
                    'Eliminado',
                    'El Producto a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El Producto no se a eliminado',
          'error'
        )
      }
    })
}

function deleteServicio(id_ser_has_op,idNegocio){
  event.preventDefault();
  var servicio = {
    id_ser_has_op : id_ser_has_op,
  }
  console.log(servicio)
  Swal.fire({
      title: '¿Esta seguro?',
      text: 'Eliminaras este Servicio',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'No, no eliminar'
    }).then((result) => {
      if (result.value) {
          $.post("/eliminar/servicio",servicio, function (response) {
              console.log(response)
              if(response == 0){
                $(location).attr('href',"/verSerAsoc/"+idNegocio+"")
                  Swal.fire(
                    'Eliminado',
                    'El Servicio a sido eliminado',
                    'success'
                  )
              }
           }).fail(function(error) { console.log(error.responseJSON) });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelado',
          'El Servicio no se a eliminado',
          'error'
        )
      }
    })
}