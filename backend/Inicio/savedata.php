<?php
require_once("../valid.php");
require_once("../config/coneccion.php");
require_once("./funciones.php");
$saveData = new Libros();


if (isset($_POST['nombre']) && $_POST['nombre']) {
    $id = 0 + intval($_POST['codi']);
    $user = 0 + intval($_POST['user']);
    $nombre = strtoupper( limpia($_POST['nombre']));

    
    
    if ($id == 0) {
        $consultausu = $saveData->getLibroByName($nombre,$user);

        if ($consultausu->rowCount() > 0) {
            echo json_encode(array('success' => 3, 'menj' => 'Libro ya existe', 'tipo' => 'error', 'titulo' => 'Opps!'));
            return;
        }

        $registro = $saveData->InsertLibro($nombre, $user);
        $msj = "Información registrada con exito";
    } else {


                $registro = $saveData->updateLibro($id,$nombre);
                $msj = 'Información actualizada';

    }

    if ($registro) {
        echo json_encode(array('success' => 1, 'menj' => $msj, 'tipo' => 'success', 'titulo' => 'Completo'));
    } else {
        echo json_encode(array('success' => 2, 'menj' => 'Error al registrar datos', 'tipo' => 'error', 'titulo' => 'Opps!'));
    }

    return;
} else {
    echo json_encode(array('success' => 3, 'menj' => 'Ingresar datos', 'tipo' => 'error', 'titulo' => 'Información incompleta'));
}

return;
function limpia($cadena)
{
    $letra = str_replace('"', "", $cadena);
    $letra = str_replace("`", "", $letra);
    $letra = str_replace("'", "", $letra);
    $letra = str_replace("/", "", $letra);
    $letra = str_replace("&", "", $letra);
    $letra = str_replace("<", "", $letra);
    $letra = str_replace(">", "", $letra);
    $letra = str_replace("|", "", $letra);
    $letra = str_replace("{", "", $letra);
    $letra = str_replace("}", "", $letra);
    return $letra;
}