<?php

function copia($dirOrigen, $dirDestino)
{
    //Creo el directorio destino

    mkdir($dirDestino, 0777, true);
    //abro el directorio origen

    if ($vcarga = opendir($dirOrigen)) {
        while ($file = readdir($vcarga)) //lo recorro enterito
        {
            if ($file != "." && $file != "..") //quito el raiz y el padre
            {
                if (!is_dir($dirOrigen . $file)) //pregunto si no es directorio
                {
                    if (copy($dirOrigen . $file, $dirDestino . $file)) //como no es directorio, copio de origen a destino
                    {
                    } else {
                        echo " ERROR!";
                    }
                } else {
                    copia($dirOrigen . $file . "/", $dirDestino . $file . "/");
                }
            }
        }
        closedir($vcarga);
    }
}

session_start();

$destino = $_POST["destino"];
$raiz = $_SESSION['raiz'];
$nombre = $_SESSION['nombre'];
$directorio = $_SESSION['directorio'];

if($raiz!="" || $nombre!="" || $directorio!=""){
 
    if (is_dir($raiz . $nombre)) {
        if (!is_dir($destino . $nombre)) {
            copia($raiz . $nombre . "/", $destino . $nombre . "/");
            $destino = urldecode($destino);
            header("Location: ../explorador.php?ruta=$destino");
        } else {
            echo "<h1>Ya existe</h1>";
            echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
        }
    } else if (is_file($raiz . $nombre)) {
        if (!is_file($destino . $nombre)) {
            copy($raiz . $nombre, $destino . $nombre);
            $destino = urldecode($destino);
            header("Location: ../explorador.php?ruta=$destino");
        } else {
            echo "<h1>Ya existe</h1>";
            echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
        }
    }


}else{
    header("Location: ../explorador.php?ruta=$destino");
}




?>