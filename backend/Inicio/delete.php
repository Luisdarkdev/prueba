<?php
require_once("../valid.php");
require_once("../config/coneccion.php");
require_once("./funciones.php");
$saveData = new Libros();
if (isset($_POST['ide']) && $_POST['ide']) {
    $codi = $_POST['ide'];
            $delete = $saveData->deleteLibro($codi);
    if ($delete) {
        echo json_encode(array('success' => 1,  'mj' => 'Libro eliminado correctamente', 'tipo' => 'success', 'titulo' => 'Listo'));
    } else {
        echo json_encode(array('success' => 2,  'mj' => 'Libro no fue eliminado', 'tipo' => 'error', 'titulo' => 'Opps'));
    }
} else {
    echo json_encode(array('success' => 3,  'mj' => 'Falta de información para realizar el proceso', 'tipo' => 'error', 'titulo' => 'Error'));
}
return;