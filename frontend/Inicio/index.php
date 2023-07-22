<?php
include('../config.php');


?>

<main>

    <div class="container">
        <div class="m-0  row justify-content-center ">
            <div class="">

                <div class="row text-center">

                    <h2>Libros </h2>
                </div>
                <div class="card">
                    <div class="card-header">
               
                        <button type="button" class="btn btn-primary add-lista" >
                         Nuevo Libro
                        </button>
                        <?php include('./view/form.php')  ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm " id="libros">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</main>
<?php include('../includes/footer.php')  ?>