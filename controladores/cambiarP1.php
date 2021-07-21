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
            <br><br><br><br>

            <h1>PROPETARIO  ACTUAL</h1>
            <br>
            <?php
                $raiz = $_POST["raiz"];
                $nombre = $_POST["nombre"];
                $directorio = $raiz.$nombre;

                $propetario= fileowner($directorio);
                echo"<h2>$propetario</h2>";

                
            ?>

            <br>
            
            <form action="cambiarP2.php" method="post">
                <h3>Ingrese el nuevo propetario</h3>
                <input style="width: 100%;" type="text" name="propetario">
                <br><br>
                <h3>Ingrese la contraseña de su usuario</h3>
                <input style="width: 100%;" type="password" name="contra">
                <input name="raiz" type="text" style="display: none;" value="<?= $raiz ?>">
                <input name="nombre" type="text" style="display: none;" value="<?= $nombre ?>">
                <br><br>
                <button  class="btn btn-primary" type="submit">Cambiar</button>
            </form>
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