<?php
require_once("../valid.php");
require_once("../config/coneccion.php");
require_once("./funciones.php");
$data = new Libros();

    $codi = $_POST['ide'];

    $read =$data->getLibroById($codi);
    $fila=$read->fetch();
    $JSON=Json_encode($fila);
    echo $JSON;
