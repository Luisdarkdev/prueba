<?php
include("../../../backend/config/coneccion.php");
require_once("../../../backend/Inicio/funciones.php");

$data_cat = new Libros();

$consulta = $data_cat->getLibros();

?>
<table class="table text-center" id="tabla-lista">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">NOMBRE</th>
            <th colspan="2">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $cont=1;
            while ($fila = $consulta->fetch()) { ?>
                <tr class="">

                <td><?= $cont ?></td>
                <td><?= strtoupper($fila['libro_name']) ?></td>
                <td class="p-0 btn-edit" data-id="<?= $fila['libro_cod'] ?>"><a type="button" class="text-success">Editar</a></td>
                <td class="p-0 btn-delete" data-id="<?= $fila['libro_cod']?>" data-name="<?= $fila['libro_name']?>"><a type="button" class="text-danger">Eliminar</a></td>
                </tr>
                <?php  
                $cont++;
                  }
            ?>
    </tbody>
</table>
<script src="./js/app.js"></script>