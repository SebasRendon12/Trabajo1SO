<?php
  // Función para el Control de Errores
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
  $arch = fopen("../log_errores.txt", "w+");
  fwrite($arch, "");
  fclose($arch);

  function borrarAdentro($dirPath){

    if (! is_dir($dirPath)) {
      throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            borrarAdentro($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
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
  <title>Eliminar</title>
</head>
<body>
  <div class="img-lobby sec">
  <div class="navigation">
    <div class="row" style="display: flex; justify-content:center;">
      <div class="col-6">
        <br><br><br><br>

        <?php

          $directorio = $_POST["directorio"];
          $raiz = $_POST["raiz"];
          $raiz = substr($raiz, 0, -1);
          if (is_dir($directorio)) {
              if (rmdir($directorio)) {
                if($directorio==$_SESSION['directorio']){
                  $_SESSION['raiz']="";
                  $_SESSION['nombre']="";
                  $_SESSION['directorio']="";
                  $_SESSION['mover']=false;
                  $_SESSION['pegar'] = false;
                }
                $raiz = urldecode($raiz);
                header("Location: ../explorador.php?ruta=$raiz");
              } else {
                borrarAdentro($directorio);
                if($directorio==$_SESSION['directorio']){
                  $_SESSION['raiz']="";
                  $_SESSION['nombre']="";
                  $_SESSION['directorio']="";
                  $_SESSION['mover']=false;
                  $_SESSION['pegar'] = false;
                }
                header("Location: ../explorador.php?ruta=$raiz");
              }
            
          } else if (is_file($directorio)) {
              if (unlink($directorio)) {
                if($directorio==$_SESSION['directorio']){
                  $_SESSION['raiz']="";
                  $_SESSION['nombre']="";
                  $_SESSION['directorio']="";
                  $_SESSION['mover']=false;
                  $_SESSION['pegar'] = false;
                }
                $raiz = urldecode($raiz);
                header("Location: ../explorador.php?ruta=$raiz");
              } else {
                echo "<h1>Ocurrio un error</h1>";
                echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
              }
          }

          ?>
        
      </div>
    </div>
  </div>
  </div>
</body>
</html>