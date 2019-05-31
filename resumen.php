<?php
require 'database.php';

$sql1 = "SELECT * FROM u_history_view";
$stmt1 = $conn->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt1 -> execute();

$sql2 = "SELECT count(*) FROM meet_view_user";
$stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt2 -> execute();
$sum = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql3 = "SELECT price FROM ticket WHERE ticket_id=5";
$stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt3 -> execute();
$precio = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$suma2 = $sum[0] * $precio[0];

while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $suma += $row[5];}

//CONSULTA PARA BOLETOS 
$sql4 = "SELECT count(*) FROM history WHERE ticket_id=1";
$stmt4 = $conn->prepare($sql4, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt4 -> execute();
$boleto1 = $stmt4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql5 = "SELECT count(*) FROM history WHERE ticket_id=2";
$stmt5 = $conn->prepare($sql5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt5 -> execute();
$boleto2 = $stmt5->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql6 = "SELECT count(*) FROM history WHERE ticket_id=3";
$stmt6 = $conn->prepare($sql6, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt6 -> execute();
$boleto3 = $stmt6->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql7 = "SELECT count(*) FROM history WHERE ticket_id=4";
$stmt7 = $conn->prepare($sql7, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt7 -> execute();
$boleto4 = $stmt7->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql8 = "SELECT count(*) FROM meet_user";
$stmt8 = $conn->prepare($sql8, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt8 -> execute();
$boleto5 = $stmt8->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql9 = "SELECT count(*) FROM history";
$stmt9 = $conn->prepare($sql9, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt9 -> execute();
$total2 = $stmt9->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

//CONSULTA PARA DISP
$sql44 = "SELECT disp FROM ticket WHERE ticket_id=1";
$stmt44 = $conn->prepare($sql44, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt44 -> execute();
$disp1 = $stmt44->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql55 = "SELECT disp FROM ticket WHERE ticket_id=2";
$stmt55 = $conn->prepare($sql55, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt55 -> execute();
$disp2 = $stmt55->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql66 = "SELECT disp FROM ticket WHERE ticket_id=3";
$stmt66 = $conn->prepare($sql66, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt66 -> execute();
$disp3 = $stmt66->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql77 = "SELECT disp FROM ticket WHERE ticket_id=4";
$stmt77 = $conn->prepare($sql77, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt77 -> execute();
$disp4 = $stmt77->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql10 = "SELECT disp FROM ticket WHERE ticket_id=5";
$stmt10 = $conn->prepare($sql10, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt10 -> execute();
$disp5 = $stmt10->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

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

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <h2>Resumen de ventas</h2>
  </section>

    <section class="contenedor">
    <section class="caja-lista">
    <table class="table tablasc table-striped table-bordered">
 						<thead>
                         <tr>
                          <th>Descripcion</th>
                          <th>Vendidos</th>
                          <th>Disponibles</th>
                        </tr>
                        </thead>
 						<tr>
                            <td>Pase por día</td>
                            <td><?php echo $boleto1[0];?></td>
                            <td><?php echo $disp1[0];?></td>
                        </tr>
                        <tr>
                            <td>VIP por día</td>
                            <td><?php echo $boleto2[0];?></td>
                            <td><?php echo $disp2[0];?></td>
                        </tr>
                        <tr>
                            <td>Pase completo</td>
                            <td><?php echo $boleto3[0];?></td>
                            <td><?php echo $disp3[0];?></td>
                        </tr>
                        <tr>
                            <td>Pase completo VIP</td>
                            <td><?php echo $boleto4[0];?></td>
                            <td><?php echo $disp4[0];?></td>
                        </tr>
                        <tr>
                            <td>Pase Meet&Greet</td>
                            <td><?php echo $boleto5[0];?></td>
                            <td><?php echo $disp5[0];?></td>
                        </tr>
    </table>
        <?php $boletos = $total2[0] + $boleto5[0];?>
        <h3>Total de boletos vendidos: <?php echo $boletos; ?></h3>
    </section>

    <section class="caja-lista">
    <table class="table tablasc table-striped table-bordered">
 						<thead>
                         <tr>
                          <th>Descripcion</th>
                          <th>Ganancia</th>
                        </tr>
                        </thead>
 						<tr>
                            <td>Ventas en Boletos</td>
                            <td>$ <?php echo $suma;?></td>
                        </tr>
                        <tr>
                            <td>Ventas en Meet&Greet</td>
                            <td>$ <?php echo $suma2;?></td>
                        </tr>
    </table>
        <?php $total = $suma + $suma2;?>
        <h3>Total: $ <?php echo $total; ?><h3>
        <a href="fpdf/tutorial/resumenpdf.php"><i class="fas fa-print"></i></a>
    </section>
  </section>

  <div class="contenedor">
    <button type="button" onClick="location.href='Histplan.php'"><i class="fas fa-arrow-alt-circle-left"></i></button>
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
