// JS para eliminar especialidad
$(document).on("click", ".btnEliminarEspecialidad", function () {
    var id_especialidad = $(this).attr("id_especialidad"); // Obtener el id de la especialidad
    var url_base = $("#url").val(); // Obtener la URL base desde el input hidden

    // Mostrar un SweetAlert para confirmar la eliminación
    Swal.fire({
      title: "¿Está seguro de eliminar la especialidad?",
      text: "Si no lo está puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, eliminar especialidad",
    }).then(function (result) {
      if (result.value) {
        // Si confirma, redirigir a la página con el ID de la especialidad en la URL
        window.location.href = url_base + "index.php?pagina=especialidades&id_especialidad=" + id_especialidad;
      }
    });
});
