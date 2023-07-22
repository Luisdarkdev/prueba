<?php
require_once("../config/coneccion.php");
require_once("./funciones.php");
$data_log = new login();


 $user = limpia($_POST['email']);
 $user = filter_var($user, FILTER_SANITIZE_EMAIL);
 
 $password = limpia($_POST['password']);
 
 $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$reed_data = $data_log->getUser($user, $password);
//JWT








//


if (intval($reed_data->rowCount()) > 0) {

    $fila = $reed_data->fetch();
    $cod=$fila['user_cod'];
    $acceso= 1 + intval($fila['user_acceso']);

    $update=$data_log->updateUser($cod,$acceso);
        session_start();
        $_SESSION['nombre_empleado']  = strtoupper( $fila['user_name'] );
        $_SESSION['user_cod']  = $fila['user_cod'];

       echo json_encode(array('success' => 1,  'msg' => 'BIENVENIDO ', 'tipo' => 'success', 'titulo' => 'Correcto'));

} else {
    echo json_encode(array('success' => 40,  'msg' => 'USUARIO O CONTRASEÑA INCORRECTA', 'tipo' => 'error', 'titulo' => 'ERROR'));
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