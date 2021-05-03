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
  <title>Editar</title>
</head>
<body>

    <div class="img-lobby sec">
        <div class="navigation">
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-6">
            <br><br><br><br>

             <?php
                $raiz = $_POST["raiz"];
            ?>

            <button style="margin-left: 10px;" class="btn btn-primary"   id="btn1"> Cambiar Nombre</button>
            <button style="margin-left: 10px;" class="btn btn-primary"   id="btn2"> Cambiar Permisos de acceso</button>
            <button style="margin-left: 10px;" class="btn btn-primary"   id="btn3"> Cambiar propetario</button>

            <?php
                echo "<a href='../explorador.php?ruta=$raiz'><h1>Volver</h1></a>";
            ?>
            
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>

