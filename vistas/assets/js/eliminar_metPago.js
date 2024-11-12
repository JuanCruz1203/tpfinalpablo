// JS para eliminar método de pago
$(document).on("click", ".btnEliminarMetodoPago", function () {
    var id_metodoPago = $(this).attr("id_metodoPago"); // Obtener el id del método de pago
    var url_base = $("#url").val(); // Obtener la URL base desde el input hidden

    // Mostrar un SweetAlert para confirmar la eliminación
    Swal.fire({
      title: "¿Está seguro de eliminar el método de pago?",
      text: "Si no lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, eliminar método de pago",
    }).then(function (result) {
      if (result.value) {
        // Si confirma, redirigir a la página con el ID del método de pago en la URL
        window.location.href = url_base + "index.php?pagina=metodosPago&id_metodoPago=" + id_metodoPago;
      }
    });
});
