<?php

// C:/Users/RENDONARTEAGA/Desktop/carpeta
// C:/Users/RENDONARTEAGA/Desktop/carpeta/carpeta

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
    $ruta_archivo = "../portapapeles.txt";

    if (file_exists($ruta_archivo)) {
        $archivo = fopen($ruta_archivo, "w");
        fwrite($archivo, "$raiz \n $nombre");
        fclose($archivo);
    }
    header("Location: ../explorador.php?ruta=$raiz");
    // COPIAR
} else if (!empty($destino)) {
    // PEGAR
    $ruta_archivo = "../portapapeles.txt";

    if (file_exists($ruta_archivo)) {
        $archivo = fopen($ruta_archivo, "r");
        $con = 0;
        do {
            $con++;
            if ($con == 1) {
                $raizO =  trim(fgets($archivo));
            } else if ($con == 2) {
                $nombreO = trim(fgets($archivo));
            }
        } while (!feof($archivo));
    }
    fclose($archivo);
    echo "<h1>$raizO$nombreO </h1>";
    echo "<h1>$destino$nombreO</h1>";
    if (is_dir($raizO . $nombreO)) {
        if (!is_dir($destino . $nombreO)) {
            copia($raizO . $nombreO . "/", $destino . $nombreO . "/");
            header("Location: ../explorador.php?ruta=$destino");
        } else {
            echo "<h1>Ya existe</h1>";
            echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
        }
    } else if (is_file($raizO . $nombreO)) {
        if (!is_file($destino . $nombreO)) {
            copy($raizO . $nombreO, $destino . $nombreO);
            header("Location: ../explorador.php?ruta=$destino");
        } else {
            echo "<h1>Ya existe</h1>";
            echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
        }
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
