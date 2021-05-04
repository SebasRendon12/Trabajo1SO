<?php

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];
$nuevoPermisos = $_POST["nombre2"];
if(chmod($raiz.$nombre,$nuevoPermisos)){
    header("Location: ../explorador.php?ruta=$raiz");
}else{
    echo "<h1>Error</h1>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
}               
?>