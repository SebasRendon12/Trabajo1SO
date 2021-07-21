<?php

function cambiarAdentro($path, $permisos, $contrasena)
{
    $path .= '/';
    if (!is_dir($path)) {
        throw new InvalidArgumentException("$path must be a directory");
    }
    $ficheros = scandir($path);
    foreach ($ficheros as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            if (is_dir($path . $value)) {
                exec("echo " . $contrasena . " | sudo -S chmod " . $permisos . " " . $path . $value);
                cambiarAdentro($path . $value, $permisos, $contrasena);
            } else {
                exec("echo " . $contrasena . " | sudo -S chmod " . $permisos . " " . $path . $value);
            }
        }
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
    <title>EditarPermisos2</title>
</head>

<body>
    <div class="img-lobby sec">
        <div class="navigation">
            <div class="row" style="display: flex; justify-content:center;">
                <div class="col-6">
                    <br><br><br><br>

                    <?php

                    $raiz = $_POST["raiz"];
                    $nombre = $_POST["nombre"];
                    $PermisosPropetarios = $_POST["pp"];
                    $PermisosGrupo = $_POST["pg"];
                    $PermisosUsuarios = $_POST["pu"];
                    $contrasena = $_POST["contra"];
                    if (strlen($contrasena) == 0) {
                        echo "<h1>No introdujo la contraseña</h1>";
                        echo "<br><br>";
                        echo "<a href='../explorador.php?ruta=$raiz'><h2>Volver</h2></a>";
                    } else {
                        if (is_dir($raiz . $nombre)) {
                            $nuevoPermisos = $PermisosPropetarios . $PermisosGrupo . $PermisosUsuarios;
                            exec("echo " . $contrasena . " | sudo -S chmod " . $nuevoPermisos . " " . $raiz . $nombre);
                            cambiarAdentro($raiz . $nombre, $nuevoPermisos, $contrasena);
                            header("Location: ../explorador.php?ruta=$raiz");
                        } else {
                            $nuevoPermisos = $PermisosPropetarios . $PermisosGrupo . $PermisosUsuarios;
                            exec("echo " . $contrasena . " | sudo -S chmod " . $nuevoPermisos . " " . $raiz . $nombre);
                            header("Location: ../explorador.php?ruta=$raiz");
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>