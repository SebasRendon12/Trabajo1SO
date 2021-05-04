<?php

$raiz = $_POST["raiz"];
$nombre = $_POST["nombre"];
$formato = "";
$nuevoNombre = $_POST["nombre2"];
if (!is_dir($raiz . $nombre)) {
    $formato = explode(".", $nombre)[count(explode(".", $nombre)) - 1];
    $formato = "." . $formato;
}
$nuevoNombre .=  $formato;
if (!is_dir($raiz . $nuevoNombre . "." . $formato) && !is_file($raiz . $nuevoNombre)) {
    if (rename($raiz . $nombre, $raiz . $nuevoNombre)) {
        header("Location: ../explorador.php?ruta=$raiz");
    } else {
        echo "<h1>Error</h1>";
        echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
    }
} else {
    echo "<h1>Ya existe un archivo con este nombre -> ( $nuevoNombre)</h1>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
}
