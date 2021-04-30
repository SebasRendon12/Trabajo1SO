<?php
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
if (empty($tipo)) {
    $tipo = "dir";
}
$raiz = $_POST["raiz"];

if ($tipo == 'dir') {
    $dir = $raiz . "/" . $nombre;
    if (!is_dir($dir)) {
        if (mkdir($dir)) {
            header("Location: ../explorador.php?ruta=$raiz");
        }
    } else {
        echo "<h1>Ya existe el directorio</h1>";
        echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
    }
} elseif ($tipo == 'file') {
    $nombre = $nombre . ".txt";
    if (!is_file($raiz . "/" . $nombre)) {
        if (touch($raiz . "/" . $nombre)) {
            header("Location: ../explorador.php?ruta=$raiz");
        } else {
            echo "<h1>Ya existe el archivo</h1>";
            echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
        }
    } else {
        echo "<h1>Ya existe el archivo</h1>";
        echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
    }
}
