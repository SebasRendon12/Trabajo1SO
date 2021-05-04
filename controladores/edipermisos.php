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
            <h1>Permisos  actuales:</h1>
            

            <?php
                $raiz = $_POST["raiz"];
                $nombre = $_POST["nombre"];

                $directorio = $raiz.$nombre;

                $permisos= fileperms($directorio);

                $perms;

                switch ($perms & 0xF000) {
                    case 0xC000: // Socket
                        $info = 's';
                        break;
                    case 0xA000: // Enlace simbólico
                        $info = 'l';
                        break;
                    case 0x8000: // Normal
                        $info = 'r';
                        break;
                    case 0x6000: // Bloque especial
                        $info = 'b';
                        break;
                    case 0x4000: // Directorio
                        $info = 'd';
                        break;
                    case 0x2000: // Carácter especial
                        $info = 'c';
                        break;
                    case 0x1000: // Tubería FIFO pipe
                        $info = 'p';
                        break;
                    default: // Desconocido
                        $info = 'u';
                }

                        // Propietario
                $info .= (($permisos & 0x0100) ? 'r' : '-');
                $info .= (($permisos & 0x0080) ? 'w' : '-');
                $info .= (($permisos & 0x0040) ?
                            (($permisos & 0x0800) ? 's' : 'x' ) :
                            (($permisos & 0x0800) ? 'S' : '-'));

                // Grupo
                $info .= (($permisos & 0x0020) ? 'r' : '-');
                $info .= (($permisos & 0x0010) ? 'w' : '-');
                $info .= (($permisos & 0x0008) ?
                            (($permisos & 0x0400) ? 's' : 'x' ) :
                            (($permisos & 0x0400) ? 'S' : '-'));

                // Mundo
                $info .= (($permisos & 0x0004) ? 'r' : '-');
                $info .= (($permisos & 0x0002) ? 'w' : '-');
                $info .= (($permisos & 0x0001) ?
                            (($permisos & 0x0200) ? 't' : 'x' ) :
                            (($permisos & 0x0200) ? 'T' : '-'));

                echo "<h2>$info</h2>";
            ?>
            <br><br><br><br>
            <h1>Ingrese los nuevos permisos</h1>
            <form action="edipermisos2.php" method="post">
                <input style="width: 100%;" type="text" name="nombre2">
                <input name="raiz" type="text" style="display: none;" value="<?= $raiz ?>">
                <input name="nombre" type="text" style="display: none;" value="<?= $nombre ?>">
                <br><br>
                <button  class="btn btn-primary" type="submit">Cambiar</button>
            </form>
            <br><br><br><br>
            
            <?php
                echo "<a href='../explorador.php?ruta=$raiz'><h2>Volver</h2></a>";
            ?>
            
            </div>
        </div>
        </div>
    </div>
</body>
</html>