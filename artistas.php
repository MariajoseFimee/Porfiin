<?php
  session_start();
  require 'database.php';

  if(isset($_SESSION['user_id'])){
  $var1 = $_SESSION['user_id'];
  }
	$sql = "SELECT user_name FROM users WHERE users_id=:users_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':users_id', $var1);
	$stmt -> execute();
	$result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

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
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />

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
        <?php if($result[0] == NULL){?>
          <a href="index.php">Home</a>
          <a href="user_log.php">Acceso</a>
        <?php } ?>
        <?php if($result[0] != NULL){?>
          <a href="index.php" id="">Home</a>
          <a href="historial.php">Mi lista</a>
          <a href="compra1.php">Reservar</a>
          <a href="logout.php">Salir</a>
        <?php } ?>
      </nav>

    </div>
  </div>

  <section class="invitados contenedor seccion" id="artistas">
    <h2>Artistas</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado1.jpg" alr="imagen invitado">
          <p>Zoé</p>
        </div>
      </li>

      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado2.jpg" alr="imagen invitado">
          <p>Caifanes</p>
        </div>
      </li>

      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado3.jpg" alr="imagen invitado">
          <p>Café Tacuba</p>
        </div>
      </li>

      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado4.jpg" alr="imagen invitado">
          <p>Miranda</p>
        </div>
      </li>

      <li>
        <div class="invitado">
          <img src="imgArtistas/invitado5.jpg" alr="imagen invitado">
          <p>DLD</p>
        </div>
      </li>

      <li>
          <div class="invitado">
            <img src="imgArtistas/invitado6.jpg" alr="imagen invitado">
            <p>Los claxons</p>
          </div>
      </li>

      <li>
          <div class="invitado">
            <img src="imgArtistas/invitado7.jpg" alr="imagen invitado">
            <p>La Gusana Ciega</p>
          </div>
      </li>
      
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado8.jpg" alr="imagen invitado">
            <p>Fobia</p>
          </div>
        </li>
        
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado9.jpg" alr="imagen invitado">
            <p>Siddhartha</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado10.jpg" alr="imagen invitado">
            <p>Natalia Lafourcade</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado11.jpg" alr="imagen invitado">
            <p>Ximena Sariñana</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado12.jpg" alr="imagen invitado">
            <p>Mon Laferte</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado13.jpg" alr="imagen invitado">
            <p>Daddy Yankee</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado14.jpeg" alr="imagen invitado">
            <p>Maluma</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado15.jpg" alr="imagen invitado">
            <p>Nicky Jam</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado16.jpg" alr="imagen invitado">
            <p>J Balvin</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado17.jpg" alr="imagen invitado">
            <p>Bad Bunny</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado18.jpg" alr="imagen invitado">
            <p>Ozuna</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado19.jpg" alr="imagen invitado">
            <p>Piso 21</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado20.jpg" alr="imagen invitado">
            <p>Manuel Turizo</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado21.jpg" alr="imagen invitado">
            <p>Sebastián Yatra</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado22.jpg" alr="imagen invitado">
            <p>Natti Natasha</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado23.jpg" alr="imagen invitado">
            <p>Karol G</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado24.jpg" alr="imagen invitado">
            <p>Don Omar</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado25.jpg" alr="imagen invitado">
            <p>Manuel Medrano</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado26.jpg" alr="imagen invitado">
            <p>Carlos Rivera</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado27.jpg" alr="imagen invitado">
            <p>Alejandro Fernández</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado28.jpg" alr="imagen invitado">
            <p>Luis Miguel</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado29.jpg" alr="imagen invitado">
            <p>Andrés Calamaro</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado30.jpg" alr="imagen invitado">
            <p>Kalimba</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado31.jpg" alr="imagen invitado">
            <p>Bunbury</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado32.jpg" alr="imagen invitado">
            <p>Emmanuel</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado33.jpg" alr="imagen invitado">
            <p>Los Ángeles Azules</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado34.jpg" alr="imagen invitado">
            <p>Los Tigres del Norte</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado35.jpg" alr="imagen invitado">
            <p>Intocable</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="imgArtistas/invitado37.jpg" alr="imagen invitado">
            <p>Yuridia</p>
          </div>
        </li>
    </ul>
  </section>

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

</body>

</html>
