<?php

  session_start();
  require 'database.php';
  $compra=$_GET['compra'];

  if(isset($_SESSION['user_id'])){
  $var1 = $_SESSION['user_id'];
  }
	$sql = "SELECT user_name FROM users WHERE users_id=:users_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':users_id', $var1);
	$stmt -> execute();
  $result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    $sql2 = "SELECT * FROM day";
    $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2 -> execute();

    $sql3 = "SELECT ticket_name, price, descr FROM ticket WHERE ticket_id=1";
    $stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt3 -> execute();

    $sql4 = "SELECT ticket_name, price, descr FROM ticket WHERE ticket_id=2";
    $stmt4 = $conn->prepare($sql4, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt4 -> execute();

    $sql5 = "SELECT ticket_name, price, descr FROM ticket WHERE ticket_id=3";
    $stmt5 = $conn->prepare($sql5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt5 -> execute();

    $sql6 = "SELECT ticket_name, price, descr FROM ticket WHERE ticket_id=4";
    $stmt6 = $conn->prepare($sql6, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt6 -> execute();

    $sql7 = "SELECT * FROM meet_view WHERE ID=1";
    $stmt7 = $conn->prepare($sql7, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt7 -> execute();

    $sql8 = "SELECT * FROM meet_view WHERE ID=2";
    $stmt8 = $conn->prepare($sql8, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt8 -> execute();

    $sql9 = "SELECT * FROM meet_view WHERE ID=3";
    $stmt9 = $conn->prepare($sql9, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt9 -> execute();

    //COMPRA 4
    if(isset($_POST["usuario"]) && isset($_POST["boleto"]) && isset($_POST["dia"]) && isset($_POST["cantidad4"]))
    {
        $usuario = $_POST["usuario"];
        $boleto = $_POST["boleto"];
        $dia = $_POST["dia"];
        $cantidad = $_POST["cantidad4"];

        require 'database.php';
        $message = '';

        $sql = "SELECT disp FROM ticket WHERE ticket_id=4";
        $disp = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $disp -> execute();
        $res = $disp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
        
        if ($res[0]>=$cantidad){
        for ($i = 1; $i <= $cantidad; $i++){
        $c4 = $conn->prepare("INSERT INTO history(users_id, ticket_id, day_id) VALUES (?,?,?)");
        $c4->bindParam(1, $usuario);
        $c4->bindParam(2, $boleto);
        $c4->bindParam(3, $dia);

        if($c4->execute())
        {
          $message = 'Reservado!!';
        }else {
          $message = 'ERROR';
         }
        }}
        else{
          $message = 'Lo sentimos, no hay suficientes entradas o los boletos están agotados.';
        }

        $num4 = $conn->prepare("UPDATE ticket SET disp=disp-($cantidad) WHERE ticket_id=4 AND disp>=($cantidad)");
        $num4->execute();


        $conn = null;
    }

    //COMPRA 3
    if(isset($_POST["usuario3"]) && isset($_POST["boleto3"]) && isset($_POST["dia3"]) && isset($_POST["cantidad3"]))
    {
        $usuario = $_POST["usuario3"];
        $boleto = $_POST["boleto3"];
        $dia = $_POST["dia3"];
        $cantidad = $_POST["cantidad3"];

        require 'database.php';
        $message = '';
        $sql = "SELECT disp FROM ticket WHERE ticket_id=3";
        $disp = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $disp -> execute();
        $res = $disp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

        if ($res[0]>=$cantidad){
        for ($i = 1; $i <= $cantidad; $i++){
        $c4 = $conn->prepare("INSERT INTO history(users_id, ticket_id, day_id) VALUES (?,?,?)");
        $c4->bindParam(1, $usuario);
        $c4->bindParam(2, $boleto);
        $c4->bindParam(3, $dia);

        if($c4->execute())
        {
          $message = 'Reservado!!';
        }else {
          $message = 'ERROR';
         }
        }}
        else{
          $message = 'Lo sentimos, no hay suficientes entradas o los boletos están agotados.';
        }

        $num3 = $conn->prepare("UPDATE ticket SET disp=disp-($cantidad) WHERE ticket_id=3 AND disp>=($cantidad)");
        $num3->execute();

        $conn = null;
    }

    //COMPRA 1
    if(isset($_POST["usuario1"]) && isset($_POST["boleto1"]) && isset($_POST["dia1"]) && isset($_POST["cantidad1"]))
    {
        $usuario = $_POST["usuario1"];
        $boleto = $_POST["boleto1"];
        $dia = $_POST["dia1"];
        $cantidad = $_POST["cantidad1"];

        require 'database.php';
        $message = '';

        $sql = "SELECT disp FROM ticket WHERE ticket_id=1";
        $disp = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $disp -> execute();
        $res = $disp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

        if ($res[0]>=$cantidad){
        for ($i = 1; $i <= $cantidad; $i++){
        $c4 = $conn->prepare("INSERT INTO history(users_id, ticket_id, day_id) VALUES (?,?,?)");
        $c4->bindParam(1, $usuario);
        $c4->bindParam(2, $boleto);
        $c4->bindParam(3, $dia);
        
        if($c4->execute())
        {
          $message = 'Reservado!!';
        }else {
          $message = 'ERROR';
         }

        }}
        else{
          $message = 'Lo sentimos, no hay suficientes entradas o los boletos están agotados.';
        }

        $num1 = $conn->prepare("UPDATE ticket SET disp=disp-($cantidad) WHERE ticket_id=1 AND disp>=($cantidad)");
        $num1->execute();

        $conn = null;
    }

    //COMPRA 2
    if(isset($_POST["usuario2"]) && isset($_POST["boleto2"]) && isset($_POST["dia2"]) && isset($_POST["cantidad2"]))
    {
        $usuario = $_POST["usuario2"];
        $boleto = $_POST["boleto2"];
        $dia = $_POST["dia2"];
        $cantidad = $_POST["cantidad2"];

        require 'database.php';
        $message = '';

        $sql = "SELECT disp FROM ticket WHERE ticket_id=2";
        $disp = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $disp -> execute();
        $res = $disp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

        if ($res[0]>=$cantidad){
        for ($i = 1; $i <= $cantidad; $i++){
        $c4 = $conn->prepare("INSERT INTO history(users_id, ticket_id, day_id) VALUES (?,?,?)");
        $c4->bindParam(1, $usuario);
        $c4->bindParam(2, $boleto);
        $c4->bindParam(3, $dia);

        if($c4->execute())
        {
          $message = 'Reservado!!';
        }else {
          $message = 'ERROR';
         }
        }}
        else{
          $message = 'Lo sentimos, no hay suficientes entradas o los boletos están agotados.';
        }

        $num2 = $conn->prepare("UPDATE ticket SET disp=disp-($cantidad) WHERE ticket_id=2 AND disp>=($cantidad)");
        $num2->execute();

        $conn = null;
    }

    //COMPRA 5
    if(isset($_POST['productos']) && isset($_POST['usuario5']))
    {
      $usuario=$_POST['usuario5'];

      $sql = "SELECT disp FROM ticket WHERE ticket_id=5";
      $disp = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $disp -> execute();
      $res = $disp->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

      foreach($_POST['productos'] as $count){
        $mensaje += 1;
      }

      if ($res[0]>=$mensaje){
      foreach($_POST['productos'] as $s){
        $c5 = $conn->prepare("INSERT INTO meet_user(meet_id, users_id) VALUES (?,?)");
        $c5->bindParam(1, $s);
        $c5->bindParam(2, $usuario);

        if($c5->execute())
        {
          $message = 'Reservado!!';
        }else {
          $message = 'ERROR';
         }
      }}
      else {
         $message = 'Lo sentimos, no hay suficientes entradas o los boletos están agotados.';
      }

      $num5 = $conn->prepare("UPDATE ticket SET disp=disp-($mensaje) WHERE ticket_id=5 AND disp>=($mensaje)");
      $num5->execute();

       $conn = null;

    }
 ?>

<?php if($result == NULL) {
      header('Location: user_log.php'); }
      else { ?>
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
          <a href="index.php">Home</a>
          <a href="historial.php">Mi lista</a>
          <a href="compra1.php">Reservar</a>
          <a href="logout.php">Salir</a>
      </nav>

    </div>
  </div>

  <section class="seccion contenedor">

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <h2>Reserva tus entradas</h2>
    <form id="registro" class="registro" method="post">
        <div id="paquetes" class="paquetes">
            <ul class="list-precios clearfix">
<!-- COMPRA 1 -->            
              <?php if($compra == 1){?>
                      <ul>
                          <?php
                          while ($row = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                            <li>
                              <div class="tabla-precio">
                                  <h3><?php print $row[0];?></h3>
                                  <p class="numero"><?php print $row[1];?></p>
                                  <ul>
                                      <li><?php print $row[2];?></li>
                                  </ul>
                          <?php } ?>
                          </div>
                            </li>

                                  <form method="POST" id="compraform">

                                  <label for="cantidad1">No.</label>
                                  <input type="number" max="5" min="1" class="form-control" id="cantidad1" name="cantidad1" placeholder="Boletos" required>

                                      <label><select name="dia1" required>
                                          <option>-Selecciona un dia-</option>
                                            <?php
                                            while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { 
                                              if($row[0]<4) {?>
                                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                                            <?php }} ?>
                                      </select></label>

                                      <input type="hidden" class="form-control" id="usuario" name="usuario1" value="<?php echo $var1; ?>" required>
                                      <input type="hidden" class="form-control" id="boleto" name="boleto1" value="<?php echo $compra; ?>" required>

                                     <button type="submit" name="boton" class="button">Comprar</button>

                                  </form>
                      </ul>
              <?php } ?>
<!-- MAJOMUSHI --> 
<!-- COMPRA 2 -->            
<?php if($compra == 2){?>
                      <ul>
                          <?php
                          while ($row = $stmt4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                            <li>
                              <div class="tabla-precio">
                                  <h3><?php print $row[0];?></h3>
                                  <p class="numero"><?php print $row[1];?></p>
                                  <ul>
                                      <li><?php print $row[2];?></li>
                                  </ul>
                         <?php } ?>
                          </div>
                            </li>

                                  <form method="POST" id="compraform">

                                  <label for="cantidad2">No.</label>
                                  <input type="number" max="5" min="1" class="form-control" id="cantidad2" name="cantidad2" placeholder="Boletos" required>

                                      <label><select name="dia2" required>
                                          <option>-Selecciona un dia-</option>
                                            <?php
                                            while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { 
                                              if($row[0]<4) {?>
                                          <option value="<?php echo $row[0];?>"><?php print $row[1];?></option>
                                            <?php }} ?>
                                      </select></label>

                                      <input type="hidden" class="form-control" id="usuario" name="usuario2" value="<?php echo $var1; ?>" required>
                                      <input type="hidden" class="form-control" id="boleto" name="boleto2" value="<?php echo $compra; ?>" required>

                                     <button type="submit" name="boton" class="button">Comprar</button>

                                  </form>
                      </ul>
              <?php } ?>
<!-- MAJOMUSHI -->
<!-- COMPRA 3 -->            
<?php if($compra == 3){?>
                      <ul>
                          <?php
                          while ($row = $stmt5->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                            <li>
                              <div class="tabla-precio">
                                  <h3><?php print $row[0];?></h3>
                                  <p class="numero"><?php print $row[1];?></p>
                                  <ul>
                                      <li><?php print $row[2];?></li>
                                  </ul>
                          <?php } ?>
                            </li>
                              </div>
                      </ul>

                      <form method="POST" id="compraform">

                        <label for="cantidad3">No.</label>
                        <input type="number" max="5" min="1" class="form-control" id="cantidad3" name="cantidad3" placeholder="Boletos" required>

                        <input type="hidden" class="form-control" id="usuario" name="usuario3" value="<?php echo $var1; ?>" required>
                        <input type="hidden" class="form-control" id="boleto" name="boleto3" value="<?php echo $compra; ?>" required>
                        <?php $dia = 4; ?>
                        <input type="hidden" class="form-control" id="dia" name="dia3" value="<?php echo $dia; ?>" required>

                        <button type="submit" name="boton" class="button">Comprar</button>

                      </form>

              <?php } ?>
<!-- MAJOMUSHI -->
<!-- COMPRA 4 -->            
<?php if($compra == 4){?>
                      <ul>
                          <?php
                          while ($row = $stmt6->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                            <li>
                              <div class="tabla-precio">
                                  <h3><?php print $row[0];?></h3>
                                  <p class="numero"><?php print $row[1];?></p>
                                  <ul>
                                      <li><?php print $row[2];?></li>
                                  </ul>
                          <?php } ?>
                            </li>
                              </div>
                      </ul>

                      <form method="POST" id="compraform">

                        <label for="cantidad4">No.</label>
                        <input type="number" max="5" min="1" class="form-control" id="cantidad4" name="cantidad4" placeholder="Boletos" required>

                        <input type="hidden" class="form-control" id="usuario" name="usuario" value="<?php echo $var1; ?>" required>
                        <input type="hidden" class="form-control" id="boleto" name="boleto" value="<?php echo $compra; ?>" required>
                        <?php $dia = 4; ?>
                        <input type="hidden" class="form-control" id="dia" name="dia" value="<?php echo $dia; ?>" required>

                        <button type="submit" name="boton" class="button">Comprar</button>

                      </form>

              <?php } ?>
<!-- MAJOMUSHI -->
<!-- COMPRA M&G -->  
<?php if($compra == 5){?>
 <form action="compras.php" method="post">

                        <h3>Elige tus favoritos</h3>
                        <div class="caja">
                              <div id="viernes" class="contenido-dia clearfix">
                              <h4>Viernes</h4>
                                <div>
                                <?php
                                    while ($row = $stmt7->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                                      <label><input type="checkbox" name="productos[]" value="<?php echo $row[0]; ?>"><time><?php print $row[2];?> </time>-- <?php print $row[3];?>--<?php print $row[4];?>--<?php print $row[5];?></label>
                                <?php } ?>  
                                </div>
                                </div>

                            <div id="sabado" class="contenido-dia clearfix">
                              <h4>Sábado</h4>
                              <div>
                              <?php
                                while ($row = $stmt8->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                                  <label><input type="checkbox"  name="productos[]" value="<?php echo $row[0]; ?>"><time><?php print $row[2];?> </time>-- <?php print $row[3];?>--<?php print $row[4];?>--<?php print $row[5];?></label>
                              <?php } ?>  
                              </div>
                            </div> 
                              
                            <div id="domingo" class="contenido-dia clearfix">
                              <h4>Domingo</h4>
                              <div>
                                <?php
                                while ($row = $stmt9->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) { ?>
                                <label><input type="checkbox"  name="productos[]" value="<?php echo $row[0]; ?>"><time><?php print $row[2];?> </time>-- <?php print $row[3];?>--<?php print $row[4];?>--<?php print $row[5];?></label>
                                <?php } ?>  
                              </div>
                              </div>

                              <input type="hidden" class="form-control" id="usuario5" name="usuario5" value="<?php echo $var1; ?>" required>

                        </div>

                        <button type="submit" name="boton" class="button">Comprar</button>
        </form>
        <?php } ?>
<!-- MAJOMUSHI -->
        </ul>
      </div>
    </form>
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
  <script src="js/prueba.js"></script>

</body>
</html>

<?php } ?>
