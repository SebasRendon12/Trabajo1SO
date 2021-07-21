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

                    <?php
                    $raiz = $_POST["raiz"];
                    $nombre = $_POST["nombre"];
                    ?>
                    <br><br>
                    <h1>NOMBRE ACTUAL:</h1>
                    <?php
                    $extension = '';
                    $displayName = $nombre;
                    if (is_file($raiz . $nombre)) {
                        $extension = pathinfo($displayName, PATHINFO_EXTENSION);
                        $displayName = basename($displayName, '.' . $extension);
                        $extension = '.' . $extension;
                    }
                    echo "<h2>$displayName</h2>";
                    ?>
                    <br><br>
                    <h1>Ingrese el nuevo nombre</h1>
                    <form action="edinombre2.php" method="post">
                        <input name="raiz" type="text" style="display: none;" value="<?= $raiz ?>">
                        <input name="nombre" type="text" style="display: none;" value="<?= $nombre ?>">
                        <div class="row" style="justify-content: center;">
                            <div class="col-8" style="padding: 0px; margin: 0px;">
                                <input style="width: 100%;" type="text" name="nombre2">
                            </div>
                            <?php
                            if (is_file($raiz . $nombre)) {
                            ?>
                                <div class="col-1" style="padding: 0px 0px 0px 7px; margin: 0px;">
                                    <span>
                                        <h4><?= $extension ?></h4>
                                    </span>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <br>
                        <div class="row" style="justify-content: center;">
                            <button class="btn btn-primary" type="submit">Cambiar</button>
                        </div>
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