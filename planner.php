<?php
  session_start();
  require 'database.php';

  if(isset($_SESSION['admin_id'])){
  $var1 = $_SESSION['admin_id'];
  }
	$sql = "SELECT admin_name FROM admins WHERE admins_id=:admins_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':admins_id', $var1);
	$stmt -> execute();
	$result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
 ?>

<?php if($result[0] == NULL){
  header('Location: planners_log.php');} 
if($result[0] != NULL){?>
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
  <link rel="stylesheet" href="fonts/style.css">
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
          <a href="logout.php">Salir</a>
      </nav>

    </div>
  </div>

  <!--CONTENIDO-->
    <div class="news parallax">
    <div class="contenido contenedor">
      <p class="slogan"><?php echo $result[0]; ?> </p>
      <h3>LATINLIVE</h3>
      <a href="Admins.php" class="button transparente"><i class="fas fa-tools"></i> Admins </a> 
      <a href="Usuarios.php" class="button transparente"><i class="fas fa-users"></i> Usuarios</a> 
      <a href="Escenarios.php" class="button transparente"><i class="fas fa-store"></i> Escenarios</a>
      <a href="Artistasb.php" class="button transparente"><i class="fas fa-guitar"></i> Artistas</a>
      <a href="Eventos.php" class="button transparente"><i class="fas fa-calendar-week"></i> Eventos</a>           
      <a href="MeetGreet.php" class="button transparente"><i class="fas fa-sign-language"></i> Meet&Greet</a>
      <a href="Boletos.php" class="button transparente"><i class="fas fa-ticket-alt"></i> Boletos</a>
      <a href="Histplan.php" class="button transparente"><i class="fas fa-archive"></i> Historial</a>
    </div>
    </div>
  <!--CONTENIDO-->

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
<?php } ?>