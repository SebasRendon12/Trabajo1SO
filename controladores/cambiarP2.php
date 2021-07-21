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
    <title>Edinombre2</title>
</head>
<body>
    <div class="img-lobby sec">
        <div class="navigation">
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-6">
            <br><br><br><br>

            <?php

/*                $raiz = $_POST["raiz"];
                $nombre = $_POST["nombre"];
                $formato = "";
                $nuevoNombre = $_POST["nombre2"];
                if (!is_dir($raiz . $nombre)) {
                    $formato = explode(".", $nombre)[count(explode(".", $nombre)) - 1];
                    $formato = "." . $formato;
                }
                $nuevoNombre .=  $formato;
                if (!is_dir($raiz . $nuevoNombre . "." . $formato) && !is_file($raiz . $nuevoNombre)) {
                    if (rename($raiz . $nombre, $raiz . $nuevoNombre)) {
                        header("Location: ../explorador.php?ruta=$raiz");
                    } else {
                        echo "<h1>Error</h1>";
                        echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
                    }
                } else {
                    echo "<h1>Ya existe un archivo con este nombre -> ( $nuevoNombre)</h1>";
                    echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
                }
*/                
                $raiz = $_POST["raiz"];
                $nombre = $_POST["nombre"];
                $nuevoUsuario = $_POST["propetario"];
                $nuevoGrupo = $nuevoUsuario;
                $contrasena = $_POST["contra"];

                if(strlen($contrasena)==0){
                    echo "<h1>No introdujo la contraseña</h1>";
                    echo "<br><br>";
                    echo "<a href='../explorador.php?ruta=$raiz'><h2>Volver</h2></a>";
                }
                else{
                    exec("echo ".$contrasena." | sudo -S chown ".$nuevoUsuario.":".$nuevoGrupo." ".$raiz.$nombre);
                    header("Location: ../explorador.php?ruta=$raiz");
                } 

                      
            ?>  
            
            </div>
        </div>
        </div>
    </div>
</body>
</html>