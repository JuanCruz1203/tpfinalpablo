$(document).on("click", ".btnEliminarEntrenador", function () {
  var id_entrenador = $(this).attr("id_entrenador_eliminar"); // Obtener el ID del entrenador a eliminar
  Swal.fire({
    title: "¿Está seguro de eliminar el entrenador?",
    text: "Si no lo está, puede cancelar la acción.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Sí, eliminar entrenador",
  }).then(function (result) {
    if (result.value) {
      window.location =
        $("#url").val() + "index.php?pagina=entrenadores&id_entrenador_eliminar=" + id_entrenador; // Redirigir a la URL de eliminación
    }
  });
});