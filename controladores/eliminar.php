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

$directorio = $_POST["directorio"];
$raiz = $_POST["raiz"];
$raiz = substr($raiz, 0, -1);
if (is_dir($directorio)) {
    if (rmdir($directorio)) {
      if($directorio==$_SESSION['directorio']){
        $_SESSION['raiz']="";
        $_SESSION['nombre']="";
        $_SESSION['directorio']="";
      }
      $raiz = urldecode($raiz);
      header("Location: ../explorador.php?ruta=$raiz");
    } else {
      borrarAdentro($directorio);
      header("Location: ../explorador.php?ruta=$raiz");
    }
  
} else if (is_file($directorio)) {
    if (unlink($directorio)) {
      if($directorio==$_SESSION['directorio']){
        $_SESSION['raiz']="";
        $_SESSION['nombre']="";
        $_SESSION['directorio']="";
      }
      $raiz = urldecode($raiz);
      header("Location: ../explorador.php?ruta=$raiz");
    } else {
      echo "<h1>Ocurrio un error</h1>";
      echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
    }
}

