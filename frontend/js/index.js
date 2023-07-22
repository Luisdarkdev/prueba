$(document).prop("title", "Login");
(function () {
  $(".btn-validar").click(function () {
          let yourUsername = $("#email").val();
          let password = $("#password").val();
          if (yourUsername == "" && password == "") {
            return;
          }
          if (yourUsername == "") {
            return;
          }
          if (password == "") {
            return;
          }
      
          $.ajax({
            type: "POST",
            url: "./backend/php/validar.php",
            data: getUser(),
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
              var jsonData = JSON.parse(response);
      
              if (jsonData.success == "1") {
                window.location.href = "./frontend/Inicio/";
              }
      
              if (jsonData.success == "40") {
                Swal.fire({
                  title: jsonData.titulo,
                  text: jsonData.msg,
                  icon: jsonData.tipo,
                  timer: 1500,
                  showCancelButton: false,
                  showConfirmButton: false,
                  toast: true,
                  position: "top-right",
                });
                return;
              }
            },
          });
        });
        function getUser() {
          var formData = new FormData();
      
          formData.append("email", $("#email").val());
          formData.append("password", $("#password").val());
          return formData;
        }


})();