<?php
require 'database.php';

  $sql2 = "SELECT artist_id, descr FROM artist";
  $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stmt2 -> execute();

  $sql3 = "SELECT stage_id, stage_name FROM stage";
  $stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stmt3 -> execute();

  $sql4 = "SELECT day_id, name_day FROM day";
  $stmt4 = $conn->prepare($sql4, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stmt4 -> execute();

  $sql5 = "SELECT hora_id, descr FROM horario";
  $stmt5 = $conn->prepare($sql5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stmt5 -> execute();

?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <img src="img/logo1.png" alt="logo latinlive">
      </div>

      <div class="menu-movil">
          <span></span>
          <span></span>
          <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
      <a href="planner.php">Home</a>
      </nav>

    </div>
  </div>

  <section class="contenedor">
    <h2>Eventos</h2>
  </section>

  <div class="col-lg-12">
        <h3>Añadir nuevos Eventos</h3>
        <form method="POST" id="formulario3">
            <div class="registro caja clearfix">

                      <div class="campo"> <!--Aquì inicia el DDL Famoso-->
                        <label><select name="famoso" required>
                        <option>-Selecciona cantante-</option>
                          <?php
                          while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                          <?php } ?>
                        </select></label>
                        </div><!--Termina Famoso-->

                        <div class="campo"> <!--Aquì inicia el DDL Escenario-->
                        <label><select name="escenario" required>
                        <option>-Selecciona escenario-</option>
                          <?php
                          while ($row = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                          <?php } ?>
                        </select></label> <!--Termina Escenario-->
                        </div>
                  
                        <div class="campo"> <!--Aquì inicia el DDL Dia-->
                        <label><select name="dia" required>
                        <option>-Selecciona dia-</option>
                          <?php
                          while ($row = $stmt4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { 
                            if($row[0]<4) {?>
                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                          <?php }} ?>
                        </select></label> <!--Termina Dia-->
                        </div>

                        <div class="campo"> <!--Aquì inicia el DDL Hora-->
                        <label><select name="hora" required>
                        <option>-Selecciona hora-</option>
                          <?php
                          while ($row = $stmt5->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                          <?php } ?>
                        </select></label> <!--Termina Hora-->
                        </div>

                      <div class="campo">
                      <button type="submit" name="boton" class="btn btn-primary">Añadir</button>
                      <p id="respuesta3"></p>
                      </div>

            </div>
    </form>
  </div>

    <div class="contenedor">
    <button id = "recargar3"><i class="fas fa-arrow-alt-circle-down"></i></button>
    <div class="caja">
        <div class="col-lg-12">
          <div id="obtenertodo3">
          </div>
        </div>
    </div>
    </div>
  
    <footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
          <h3>Sobre<span> latinlive</span></h3>
          <p>El evento más esperado por toda Latinoamérica.</p>
          <p>36 artistas en un mismo lugar. ¿Estás listo?</p>
      </div>
      <div class="ultimos-tweets">
          <h3>Más<span> información</span></h3>
          <ul>
                <li>Preguntas Frecuentes.</li>
                <li>Nuestras políticas.</li>
                <li>Ayuda.</li>
          </ul>
      </div>
      <div class="menu">
          <h3>Redes<span> Sociales</span></h3>
          <nav class="redes-sociales">
          <nav class="redes-sociales">
        <a href="https://www.facebook.com/marijo.avi19"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/1903Guzman"><i class="fab fa-twitter"></i></a>
              <a href="https://www.pinterest.com.mx/pin/401875966739474515/"><i class="fab fa-spotify"></i></a>
              <a href="https://www.youtube.com/watch?v=HjVEFk9H6gs"><i class="fab fa-youtube"></i></a>
              <a href="https://www.instagram.com/mariajose_19031/?hl=es-la"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos Reservados LATINLIVE 2020.</p>
  </footer>

 <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/main.js"></script>
  <script src="js/filtro.js"></script>
  <script src="js/index.js"></script>
  <script src="js/prueba.js"></script>

</body>

</html>
