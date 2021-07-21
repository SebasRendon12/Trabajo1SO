<?php

    function LogDeErrores(
        $numeroDeError,
        $descripcion,
        $fichero,
        $linea,
        $contexto
    ) {
        error_log("Error: [" . $numeroDeError . "] " . $descripcion . " " . $fichero . " " . $linea . " " . json_encode($contexto) . " \n\r", 3, "log_errores.txt");
    }
    set_error_handler("LogDeErrores",  E_WARNING | E_NOTICE);
    $arch = fopen("log_errores.txt", "w+");
    fwrite($arch, "");
    fclose($arch);

    function permisos($permiso){
        if($permiso == "0"){
            $aux="Sin permisos";
            return $aux;
        }
        elseif($permiso == "1"){
            $aux="Ejecución";
            return $aux;
        }
        elseif($permiso == "2"){
            $aux="Escritura";
            return $aux;
        }
        elseif($permiso == "3"){
            $aux="Escritura y Ejecución";
            return $aux;
        }
        elseif($permiso == "4"){
            $aux="Lectura";
            return $aux;
        }
        elseif($permiso == "5"){
            $aux="Lectura y Ejecución";
            return $aux;
        }
        elseif($permiso == "6"){
            $aux="Lectura y Escritura";
            return $aux;
        }
        elseif($permiso == "7"){
            $aux="Permisos Totales";
            return $aux;
        }
    } 


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
    <title>Permisos</title>
</head>

<body>
    <div class="img-lobby sec">
        <div class="navigation">
            <div class="row" style="display: flex; justify-content:center;">
                <div class="col-10">

                <br><br>

                <h1>PERMISOS  ACTUALES</h1>
                <?php
                    $raiz = $_POST["raiz"];
                    $nombre = $_POST["nombre"];
                    $directorio = $raiz.$nombre;

                    $permisos = substr(sprintf('%o', fileperms($directorio)), -4);
                    $permisoPropetario=substr($permisos,1,1);
                    $permisoGrupo=substr($permisos,2,1);
                    $permisoUsuario=substr($permisos,3,1);

                    $permisoPropetario=permisos($permisoPropetario);
                    $permisoGrupo=permisos($permisoGrupo);
                    $permisoUsuario=permisos($permisoUsuario);

                    echo "<br>";
                    echo "<br>";
                    echo "<h2>PERMISOS DE PROPETARIO:</h2>";
                    echo "<h2>$permisoPropetario</h2>";
                    echo "<br>";
                    echo "<h2>PERMISOS DE GRUPO:</h2>";
                    echo "<h2>$permisoGrupo</h2>";
                    echo "<br>";
                    echo "<h2>PERMISOS RESTO DE USUARIOS:</h2>";
                    echo "<h2>$permisoUsuario</h2>";

                ?>


                <br><br>

                <?php
                    echo "<a href='../explorador.php?ruta=$raiz'><h2>Volver</h2></a>";
                ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>