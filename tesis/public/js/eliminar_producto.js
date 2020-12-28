function confirmDelete(e) {
    e.preventDefault();
    Swal.fire({
      title: '¿Está seguro?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí'
    }).then((result) => {
        if (result.value) {
            // Al confirmar que se desea eliminar
            deleteRequest(); 
        }
    })   
}        