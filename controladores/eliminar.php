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


$directorio = $_POST["directorio"];
$raiz = $_POST["raiz"];
$raiz = substr($raiz, 0, -1);
if (is_dir($directorio)) {
  if (rmdir($directorio)) {
    header("Location: ../explorador.php?ruta=$raiz");
  } else {
    echo "<h2>La carpeta no esta vacía, no es posible borrarla</h2>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
  }
} else if (is_file($directorio)) {
  if (unlink($directorio)) {
    header("Location: ../explorador.php?ruta=$raiz");
  } else {
    echo "<h1>Ocurrio un error</h1>";
    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
  }
}
