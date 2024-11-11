// JS eliminar estado de entrenador

$(document).on("click", ".btnEliminarEstadoEnt", function () {
    var id_estado_ent = $(this).attr("id_estado_ent_eliminar");
    Swal.fire({
      title: "¿Está seguro de eliminar el estado del entrenador?",
      text: "Si no lo está, puede cancelar la acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, eliminar estado",
    }).then(function (result) {
      if (result.value) {
        window.location =
          $("#url").val() + "index.php?pagina=estEntrenadores&id_estado_ent_eliminar=" + id_estado_ent;
      }
    });
});
