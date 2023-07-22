$(document).prop("title", "Admin | Libros");
(function () {
  $("#libros").load("./view/tabla.php");

  $(".add-lista").click(function (e) {
    $("#listas-modal").modal("show");
    $("#codi").val("");
    $("#nombre").val("");
  });
  $(".add-lista-new").click(function () {
    $.ajax({
      type: "POST",
      url: "../../backend/Inicio/savedata.php",
      data: getData(),
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          Swal.fire({
            title: jsonData.titulo,
            text: jsonData.menj,
            icon: jsonData.tipo,
            confirmButtonText: "Aceptar",
          });
          $("#listas-modal").modal("toggle");
          $("#libros").load("./view/tabla.php");
        }

        if (
          jsonData.success == "2" ||
          jsonData.success == "3" ||
          jsonData.success == "4"
        ) {
          Swal.fire({
            title: jsonData.titulo,
            text: jsonData.menj,
            icon: jsonData.tipo,
            confirmButtonText: "Aceptar",
          });
        }
      },
    });
  });
  function getData() {
    var formData = new FormData();
    formData.append("codi", $("#codi").val());
    formData.append("user", $("#user").val());
    formData.append("nombre", $("#nombre").val());
    return formData;
  }

})();
