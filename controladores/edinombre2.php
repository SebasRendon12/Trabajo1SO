<?php

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];
$nuevoNombre = $_POST["nombre2"];
if(rename($raiz.$nombre,$raiz.$nuevoNombre)){
    header("Location: ../explorador.php?ruta=$raiz");
}else{
    echo "<h1>Error</h1>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
}               
?>