<?php

session_start();

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];

$_SESSION['raiz']=$raiz;
$_SESSION['nombre']=$nombre;
$_SESSION['directorio']=$raiz.$nombre;
$_SESSION['mover']=true;

if($_SESSION['pegar']=true){
    $_SESSION['pegar']=false;
}


header("Location: ../explorador.php?ruta=$raiz");

?>