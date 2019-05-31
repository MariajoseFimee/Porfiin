<?php

if(isset($_GET["id"]) && isset($_GET["precio"])&& isset($_GET["disp"]))
  {
      $id = $_GET["id"];
      $precio = $_GET["precio"];
      $disp = $_GET["disp"];

      require 'database.php';
      $message = '';
  
    if(!empty($_POST['precioA']) && !empty($_POST['dispA'])) {
      $sql = "UPDATE ticket SET price=:precio, disp=:disp WHERE ticket_id=:id";
      $stmt = $conn->prepare($sql);
      $stmt -> bindParam(':id', $id);
      $stmt -> bindParam(':precio', $_POST['precioA']);
      $stmt -> bindParam(':disp', $_POST['dispA']);
  
      if($stmt->execute()){
        $message = 'Cambio guardado.';
        header("Location:Boletos.php");
       }
      else {
        $message = 'Lo sentimos, no se ha podido cambiar.';
       }
     }

  }
  else{
      header("Location:Boletos.php");
  }
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
    <h2>Boletos</h2>
  </section>

  <div class="col-lg-12">
    <form id="registro" class="registro" method="post">
        <div id="datos_usuario" class="registro caja clearfix">
        <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
            <div class="campo">
                <label for="name">Precio:</label>
                <input type="text" id="precioA" name="precioA" value="<?php echo $precio;?>" required>
            </div>
            <div class="campo">
                <label for="password">Disp:</label>
                <input type="text" id="dispA" name="dispA" value="<?php echo $disp;?>" required>
            </div>

            <div class="campo">
 				<input type="submit" value="Cambiar"/>
            </div>

        </div>
    </form>
  </div>

    <div class="contenedor">
    <button type="button" onClick="location.href='Boletos.php'"><i class="fas fa-arrow-alt-circle-left"></i></button>
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
  </body>
</html>