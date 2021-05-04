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
                <div class="col-10">
                    <br>

                    <h1>PERMISOS</h1>
                    <br><br>
                    <?php
                    $raiz = $_POST["raiz"];
                    $nombre = $_POST["nombre"];
                    $directorio = $raiz . $nombre;

                    $permisos = substr(sprintf('%o', fileperms($directorio)), -4);

                    echo "<h1>$permisos</h1>";
                    ?>
                    <br><br>
                    <div class="row" style="display: flex; justify-content: center;">
                        <h2>Nomenclatura:</h2>
                    </div>
                    <div class="row" style="display: flex;">
                        <div class="col-6">
                            <div class="row">
                                <h3>El 7 – permisos totales</h3>
                            </div>
                            <div class="row">
                                <h3>El 6 – lectura y escritura</h3>
                            </div>
                            <div class="row">
                                <h3>El 5 – lectura y ejecución</h3>
                            </div>
                            <div class="row">
                                <h3>El 4 – lectura</h3>
                            </div>
                            <div class="row">
                                <h3>El 3 – escritura y ejecución</h3>
                            </div>
                            <div class="row">
                                <h3>El 2 – escritura</h3>
                            </div>
                            <div class="row">
                                <h3>El 1 – ejecución</h3>
                            </div>
                            <div class="row">
                                <h3>El 0 – sin permisos</h3>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <h3>el primero caracter: tipo de archivo</h3>
                            </div><br>
                            <div class="row">
                                <h3>el segundo caracter: permisos de propetario</h3>
                            </div><br>
                            <div class="row">
                                <h3>el tercer caracter: permisos de grupo</h3>
                            </div><br>
                            <div class="row">
                                <h3>el cuarto caracter: permisos del resto usuario</h3>
                            </div>
                        </div>
                    </div>

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