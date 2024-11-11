//    JS eliminar

$(document).on("click", ".btnEliminarCliente", function () {
  var id_cliente = $(this).attr("id_cliente_eliminar");
  Swal.fire({
    title: "Está seguro de eliminar el cliente?",
    text: "Si no lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar cliente",
  }).then(function (result) {
    if (result.value) {
      window.location =
        $("#url").val() + "index.php?pagina=clientes&id_cliente_eliminar=" + id_cliente;
    }
  });
});