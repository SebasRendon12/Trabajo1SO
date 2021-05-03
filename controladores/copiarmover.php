<?php

session_start();

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];

$_SESSION['raiz']=$raiz;
$_SESSION['nombre']=$nombre;
$_SESSION['directorio']=$raiz.$nombre;

header("Location: ../explorador.php?ruta=$raiz");

?>