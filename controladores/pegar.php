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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Estilos-->
    <link rel="stylesheet" href="../css/styles.css">
    <script src="scripts.js"></script>
    <script src="https://kit.fontawesome.com/b3642d5c24.js" crossorigin="anonymous"></script>
    <title>Pegar</title>
</head>

<body>
    <div class="img-lobby sec">
        <div class="navigation">
            <div class="row" style="display: flex; justify-content:center;">
                <div class="col-6">
                    <br><br><br><br>

                    <?php

                    $destino = $_POST["destino"];
                    $raiz = $_SESSION['raiz'];
                    $nombre = $_SESSION['nombre'];
                    $directorio = $_SESSION['directorio'];

                    if ($raiz != "" || $nombre != "" || $directorio != "") {
                        if ($raiz . $nombre . "/" <> $destino) {
                            if (is_dir($raiz . $nombre)) {
                                if (!is_dir($destino . $nombre)) {
                                    copia($raiz . $nombre . "/", $destino . $nombre . "/");
                                    $destino = urldecode($destino);
                                    $_SESSION['pegar'] = false;
                                    header("Location: ../explorador.php?ruta=$destino");
                                } else {
                                    echo "<h1>Ya existe</h1>";
                                    echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
                                }
                            } else if (is_file($raiz . $nombre)) {
                                if (!is_file($destino . $nombre)) {
                                    copy($raiz . $nombre, $destino . $nombre);
                                    $destino = urldecode($destino);
                                    $_SESSION['pegar'] = false;
                                    header("Location: ../explorador.php?ruta=$destino");
                                } else {
                                    echo "<h1>Ya existe</h1>";
                                    echo "<br>";
                                    echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
                                }
                            }
                        } else {
                            echo "<h3>No se puede pegar una carpeta dentro de si misma</h3>";
                            echo "<br>";
                            echo "<a href='../explorador.php?ruta=$destino'><h1>Volver</h1></a>";
                        }
                    } else {
                        $_SESSION['pegar'] = false;
                        header("Location: ../explorador.php?ruta=$destino");
                    }




                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>