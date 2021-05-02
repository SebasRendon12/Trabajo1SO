<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Estilos-->
  <link rel="stylesheet" href="css/styles.css">
  <script src="scripts.js"></script>
  <script src="https://kit.fontawesome.com/b3642d5c24.js" crossorigin="anonymous"></script>
  <title>Explorador de archivos</title>
</head>

<body>
  <div class="img-lobby sec">
    <div class="navigation">
      <div class="row" style="display: flex; justify-content:center;">
        <div class="col-6">
          <br><br><br><br>

          <form style="width: 500px;" class="form-group" action="explorador.php" method="POST">
            <div class="form-group" style="width: 500px;">
              <label style="color: white;" for="ruta">Directorio raíz: </label>
              <input type="text" name="ruta" id="ruta" class="form-control" require>
            </div>
            <div class="input-group-prepend">
              <div class="form-group">
                <button style="width: 100px;" class="btn btn-primary" title="Buscar" type="submit">Ir</button>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</body>

</html>