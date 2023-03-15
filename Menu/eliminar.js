function Alertaeliminacion(codigo) {
  Swal.fire({
    title: "¿Está seguro de eliminar este usuario?",
    text: "¡No podrá volver a usar este usuario!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
        mandar_php_eliminar(codigo)
    }
  });
}

function mandar_php_eliminar(codigo) {
  parametros = { id: codigo };
  $.ajax({
    data: parametros,
    url: "eliminar_usuario.php",
    type: "POST",
    beforeSend: function () {},
    success: function () {
      Swal.fire(
        "¡Eliminado!",
        "El usuario fue eliminado correctamente",
        "success"
      ).then((result) => {
        /* Read more about handling dismissals below */

        window.location.href = "configuracion.php";

      });
    },
  });
}
