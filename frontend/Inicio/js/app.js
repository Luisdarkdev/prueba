(function () {
  
    ////////////////////////////
  
      $("#tabla-lista").on('click','.btn-edit', function (e){
     
            let ide = e.currentTarget.dataset.id;
            $("#listas-modal").modal("show");
    
            $.ajax({
                type: "POST",
                url: "../../backend/Inicio/readbyid.php",
                data: {ide},
                dataType: "JSON",
            }).done(function(res){
              $("#codi").val(res.libro_cod);
              $("#nombre").val(res.libro_name);
          })
        })
        
    
        $("#tabla-lista").on('click','.btn-delete', function (e){
            let ide = e.currentTarget.dataset.id;
            let name = e.currentTarget.dataset.name;
                Swal.fire({
                  title: "Eliminar registro",
                  text: "Eliminar Libro " + name,
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Eliminar",
                  cancelButtonText: "Cancelar",
                }).then((result) => {
                  if (result.value) {
                    $.ajax({
                      type: "POST",
                      url: "../../backend/Inicio/delete.php",
                      data: { ide  },
                      dataType: "JSON",
                    }).done(function (resp) {
                      if (resp.success == "1") {
                        Swal.fire({
                          title: resp.titulo,
                          text: resp.mj,
                          icon: resp.tipo,
                          confirmButtonText: "Aceptar",
                        });
    
                        $("#libros").load("./view/tabla.php");
                    }
                      if (resp.success == "2" || resp.success == "3" || resp.success == "4") {
                        Swal.fire({
                          title: resp.titulo,
                          text: resp.mj,
                          icon: resp.tipo,
                          confirmButtonText: "Aceptar",
                        });
                      }
                    });
                  }
                });
            
        })
    //////////////////////////////
    
    })();