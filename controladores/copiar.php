<?php
include ("portapapeles.php");

function full_copy($source, $target)
{
    if (is_dir($source)) {
        @mkdir($target);
        $d = dir($source);
        while (FALSE !== ($entry = $d->read())) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $Entry = $source . '/' . $entry;
            if (is_dir($Entry)) {
                full_copy($Entry, $target . '/' . $entry);
                continue;
            }
            copy($Entry, $target . '/' . $entry);
        }

        $d->close();
    } else {
        copy($source, $target);
    }
}

if (!empty($_POST["raiz"])) {
    $raiz = $_POST["raiz"];
}
if (!empty($_POST["destino"])) {
    $destino = $_POST["destino"];
}
if (!empty($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}

if (!empty($raiz) && !empty($nombre)) {
    // COPIAR
    CopiarPegar::setPortapapeles($raiz, $nombre);
    header("Location: ../explorador.php?ruta=$raiz");
    // COPIAR
} else if (!empty($destino)) {
    // PEGAR
    if (!is_dir($destino . CopiarPegar::getNombre())) {
        full_copy(CopiarPegar::getDirectorio(), $destino . CopiarPegar::getNombre());
    } else {
        echo "<h1>Ya existe</h1>";
        echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
    }
    // PEGAR
}

// if (is_file($directorio)){
//     if($directorio == $destino){
//         if(copy($directorio,$destino.))
//     }else{
//         if(copy($directorio,$destino)){
//             header("Location: ../explorador.php?ruta=$raiz");
//         }
//         else{
//             echo "<h1>No se pudo copiar</h1>";
//             echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
//         }
//     }
// }
// elseif(!is_dir($directorio)){

// }
