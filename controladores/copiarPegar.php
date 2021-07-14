<?php

session_start();

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];

$_SESSION['raiz']=$raiz;
$_SESSION['nombre']=$nombre;
$_SESSION['directorio']=$raiz.$nombre;
$_SESSION['pegar']=true;

if($_SESSION['mover']=true){
    $_SESSION['mover']=false;
}


header("Location: ../explorador.php?ruta=$raiz");

?>