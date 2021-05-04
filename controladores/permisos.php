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
    <title>Permisos</title>
</head>

<body>
    <div class="img-lobby sec">
        <div class="navigation">
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-6">
            <br><br><br><br>

            <h1>Permisos</h1>
            <br><br>
            <?php
                $raiz = $_POST["raiz"];
                $nombre = $_POST["nombre"];
                $directorio = $raiz.$nombre;

                $permisos=substr(sprintf('%o', fileperms($directorio)), -4);

                echo "<h1>$permisos</h1>";

                //$permisos= fileperms($directorio);

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

                // echo "<h1>$permisos</h1>";
            ?>
            <br><br>
            <?php    
                echo "<h2>Siendo:</h2>";
                echo "<h2>el primero caracter: tipo de archivo</h2>";
                echo "<h2>el primer grupo de 3: permisos de propetario </h2>";
                echo "<h2>el segundo grupo de 2: permisos de grupo </h2>";
                echo "<h2>el tercero grupo de 3: permisos del resto usuario </h2>";
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