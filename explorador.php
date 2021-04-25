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
      if (empty($_GET["ruta"])) {
        $nomdir = $_POST['ruta'] . "\\";
      } else {
        $nomdir = $_GET["ruta"] . "\\";
      }

      if ($nomdir == "") {
      ?>
        <div class="row" style="justify-content: center;">
          <div style="margin: 65px 20px 0 20px;">
            <a href="formulario.php">
              <h3>No seleccionó un directorio raíz</h3>
            </a>
          </div>
        </div>
      <?php
      } elseif (!is_dir($nomdir)) {
      ?>
        <div class="row" style="justify-content: center;">
          <div style="margin: 65px 20px 0 20px;">
            <a href="formulario.php">
              <h3>Este directorio no existe</h3>
            </a>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div id="Cabecera">
          <?php
          echo "<h2>Directorio actual: $nomdir</h2>\n";
          $dir = opendir($nomdir);
          ?>
        </div>
        <br><br>
        <div class="row">
          <?php
          $i = 0;
          while (($file = readdir($dir)) != FALSE) {
            $i++;
          ?>
            <?php
            if ($file != ".") {
            ?>
              <div class="col-3" style="margin-top: 20px;">
                <div style="min-height: 264px; padding: 5px;" onmouseover=<?= "mostrar($i)" ?> onmouseout=<?= "ocultar($i)" ?>>

                  <?php
                  if ($file == "..") {
                  ?>

                    <!-- Return -->
                    <div class="sec">
                      <div style="padding: 0px; justify-content: center; display: flex;" class="col-9">
                        <?php
                        echo '<a href="?ruta=' . urlencode($nomdir . $file) . '" >';
                        ?>
                        <img src="./assets/back.png" alt="Atras">
                        <?php
                        echo '</a>';
                        ?>
                      </div>
                    </div>
                    <div style="text-align: center;">
                      <h3>Atrás</h3>
                    </div>
                    <!-- Return -->

                    <!-- Directorio -->
                  <?php
                  } else if (is_dir($nomdir . $file)) {
                  ?>
                    <div class="sec">
                      <div style="padding: 0px; justify-content: center; display: flex;" class="col-9">
                        <?php
                        echo '<a href="?ruta=' . urlencode($nomdir . $file) . '" >';
                        ?>
                        <img src="./assets/dir.png" alt="Directorio">
                        <?php
                        echo '</a>';
                        ?>
                      </div>
                      <div class="col-2 botones" id=<?= "Acciones$i" ?> style="display: none;">
                        <a class="btn btn-info accion" href="#">
                          <i class="far fa-hand-paper"></i>
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
                      <h3 style="word-wrap: break-word;"><?= $file ?></h3>
                    </div>
                    <div class="row sec" style="padding: 0 10px 0 10px;">
                      <div class="col-7" style="text-align: start;">
                        <h6 style="font-size: 13px;"><?= date("d/m/Y g:i a", filemtime($nomdir . $file)) ?></h6>
                      </div>
                      <div class="col-5" style="text-align: end;">
                        <h6>-</h6>
                      </div>
                    </div>
                    <!-- Directorio -->

                  <?php
                  } else if (!is_dir($nomdir . $file)) {
                  ?>

                    <!-- File -->
                    <div class="sec">
                      <div style="padding: 0px; justify-content: center; display: flex;" class="col-9">
                        <img src="./assets/file.png" alt="Archivo">
                      </div>
                      <div class="col-2 botones" id=<?= "Acciones$i" ?> style="display: none;">
                        <a class="btn btn-info accion" href="#">
                          <i class="far fa-hand-paper"></i>
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
                      <h3 style="word-wrap: break-word;">
                        <?= $file ?>
                      </h3>
                    </div>
                    <div class="row sec" style="padding: 0 10px 0 10px;">
                      <div class="col-7" style="text-align: start;">
                        <h6 style="font-size: 13px;"><?= date("d/m/Y g:i a", filemtime($nomdir . $file)) ?></h6>
                      </div>
                      <div class="col-5" style="text-align: end;">
                        <h6 style="font-size: 13px;"><?= (filesize($nomdir . $file) * 0.000001) ?> Mb</h6>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <!-- File -->

                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
        <br><br><br><br>
        <div class="row" style="justify-content: center;">
          <div style="margin: 65px 20px 0 20px;">
            <a href="index.php">
              <h3>Volver al Menú Principal</h3>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</body>

</html>