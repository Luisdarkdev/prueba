<?php
session_start();
if(empty($_SESSION['user_cod']))
  {
   header('location:../salir.php');	
	  }
  if(empty($_SESSION['nombre_empleado']))
  {
    header('location:../salir.php');	
}

  require_once "../../backend/config/coneccion.php"; 

 $nombre=($_SESSION['nombre_empleado']);
 $cod_user=($_SESSION['user_cod']);
 include "../includes/head.php";
$tipo=1;

 if($tipo=="1"){
   
   include "../includes/header.php";
  }





 ?>