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
    <title>edinombre</title>
</head>
<body>
    <div class="img-lobby sec">
        <div class="navigation">
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-6">

            <br>
            <h2>PERMISOS  ACTUALES</h2>
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
                echo "<h4>PERMISOS DE PROPETARIO:</h4>";
                echo "<h4>$permisoPropetario</h4>";
                echo "<br>";
                echo "<h4>PERMISOS DE GRUPO:</h4>";
                echo "<h4>$permisoGrupo</h4>";
                echo "<br>";
                echo "<h4>PERMISOS RESTO DE USUARIOS:</h4>";
                echo "<h4>$permisoUsuario</h4>";

                
            ?>
            <br><br>
            <form action="edipermisos2.php" method="post">
                <p style="color: white">Selecione los nuevos permisos de propetario: <br/>
                    <input id="1" type="radio" name="pp" value="0" checked>
                    <label for="1">Sin Permisos</label><br>

                    <input id="2" type="radio" name="pp" value="1">
                    <label for="2">Ejecución</label><br>

                    <input id="3" type="radio" name="pp" value="2">
                    <label for="3">Escritura</label><br>

                    <input id="4" type="radio" name="pp" value="3">
                    <label for="4">Escritura y Ejecución</label><br>

                    <input id="5" type="radio" name="pp" value="4">
                    <label for="5">Lectura</label><br>

                    <input id="6" type="radio" name="pp" value="5">
                    <label for="6">Lectura y Ejecución</label><br>

                    <input id="7" type="radio" name="pp" value="6">
                    <label for="7">Lectura y Escritura</label><br>

                    <input id="8" type="radio" name="pp" value="7">
                    <label for="8">Permisos Totales</label><br>
                    
                </p>

                <p style="color: white">Selecione los nuevos permisos de grupo: <br/>
                    <input id="1" type="radio" name="pg" value="0" checked>
                    <label for="1">Sin Permisos</label><br>

                    <input id="2" type="radio" name="pg" value="1">
                    <label for="2">Ejecución</label><br>

                    <input id="3" type="radio" name="pg" value="2">
                    <label for="3">Escritura</label><br>

                    <input id="4" type="radio" name="pg" value="3">
                    <label for="4">Escritura y Ejecución</label><br>

                    <input id="5" type="radio" name="pg" value="4">
                    <label for="5">Lectura</label><br>

                    <input id="6" type="radio" name="pg" value="5">
                    <label for="6">Lectura y Ejecución</label><br>

                    <input id="7" type="radio" name="pg" value="6">
                    <label for="7">Lectura y Escritura</label><br>

                    <input id="8" type="radio" name="pg" value="7">
                    <label for="8">Permisos Totales</label><br>
                    
                </p>

                <p style="color: white">Selecione los nuevos permisos del resto de usuarios : <br/>
                    <input id="1" type="radio" name="pu" value="0" checked>
                    <label for="1">Sin Permisos</label><br>

                    <input id="2" type="radio" name="pu" value="1">
                    <label for="2">Ejecución</label><br>

                    <input id="3" type="radio" name="pu" value="2">
                    <label for="3">Escritura</label><br>

                    <input id="4" type="radio" name="pu" value="3">
                    <label for="4">Escritura y Ejecución</label><br>

                    <input id="5" type="radio" name="pu" value="4">
                    <label for="5">Lectura</label><br>

                    <input id="6" type="radio" name="pu" value="5">
                    <label for="6">Lectura y Ejecución</label><br>

                    <input id="7" type="radio" name="pu" value="6">
                    <label for="7">Lectura y Escritura</label><br>

                    <input id="8" type="radio" name="pu" value="7">
                    <label for="8">Permisos Totales</label><br>
                    
                </p>

                <p style="color: white">Ingrese la contraseña de su usuario:<br/>
                    <input style="width: 100%;" type="password" name="contra">
                </p>

                <input name="raiz" type="text" style="display: none;" value="<?= $raiz ?>">
                <input name="nombre" type="text" style="display: none;" value="<?= $nombre ?>">
                <br>

                <button  class="btn btn-primary" type="submit">Cambiar</button>
            </form>

            <br>
            
            <?php
                echo "<a href='../explorador.php?ruta=$raiz'><h2>Volver</h2></a>";
            ?>
            
            </div>
        </div>
        </div>
    </div>
</body>
</html>