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
  <title>Explorador de archivos Lo'pega</title>
</head>

<body>
  <div class="img-lobby sec">
    <div class="navigation">
      <br>
      <?php
      $nomdir = "C:\Users\RENDONARTEAGA\Desktop";
      echo "<h2>Directorio actual: $nomdir</h2>\n";
      $dir = opendir($nomdir);
      ?>
      <br><br>
      <div class="col-12 sec">
        <?php
        for ($i = 0; $i < 3; $i++) {
        ?>
          <div class="col-3">
            <div class="carta" onmouseover=<?= "mostrar($i)" ?> onmouseout=<?= "ocultar($i)" ?>>
              <div class="sec">
                <div style="padding: 0px; justify-content: center; display: flex;" class="col-9">
                  <img src="./assets/file.png" alt="Archivo">
                </div>
                <div class="col-2 botones" id=<?= "Acciones$i" ?> style="display: none;">
                  <a class="btn btn-info accion" href="#">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a class="btn btn-primary accion" href="#">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a class="btn btn-danger accion" href="#">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                  <a class="btn btn-light accion" href="#">
                    <i class="fas fa-info-circle"></i>
                  </a>
                </div>
              </div>
              <div style="text-align: center;">
                <h3>Test</h3>
              </div>
              <div class="row sec" style="padding: 0 10px 0 10px;">
                <div class="col-7" style="text-align: start;">
                  <h6>Abril 17 2021</h6>
                </div>
                <div class="col-5" style="text-align: end;">
                  <h6>15.64 Mb</h6>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <br><br><br><br>
      <div class="row" style="justify-content: center;">
        <div style="margin: 65px 20px 0 20px;">
          <a href="index.html">
            <h3>Volver al Menú Principal</h3>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>