<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
    scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <link rel="stylesheet" href="css/formstyle.css">
    <title>Ejercicio 2</title>
  </head>
  <body>
    <h1>EJERCICIO 2</h1>
    <div id="formarea">
      <?php
        if(!isset($_POST['Enviar'])):
       ?>
       <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" name="frmejercicio2">
         <h2>Información de pago</h2>
         <span>
           <label>Cantidad de celulares:</label>&nbsp;&nbsp;
         </span> <!--Input de tipo número con incremento de 1 para definir la cantidad de celulares a llevar-->
         <input type="number" name="cantidad" value="" min="0" step="1" required/><br><br>
         <span> <!--Input de tipo número con incremento de 0.1 para definir el precio unitario de los celulares-->
           <label>Precio Unitario:</label>&nbsp;&nbsp;
         </span>
         <input type="number" name="precio" value="" min="0" step="0.1" required/><br><br>
         <input type="submit" name="Enviar" value="Enviar">
       </form>
       <?php
     else: //Definición de variables
          $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
          $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
          if(($cantidad<=0 || $precio<=0)||($cantidad<=0 && $precio<=0)){ //Validación para no dejar cantidad y/o precio con un valor de 0
            echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Ingrese una cantidad válida </span><br>";
            echo "<span style=\"color:Green;font:bold 15pt 'Lucida Sans';\"><a
            href=\"{$_SERVER['PHP_SELF']}\">Calcular nuevo total</a>";
          }else{
          $total_SinDescuento = round(($cantidad*$precio)*100)/100;
          if($cantidad>=1 && $cantidad<=2){
            $descuento = 0; //Si lleva entre 1 y 2 celulares, no hay descuento
          }elseif($cantidad>=3 && $cantidad<=7){
            $descuento = 0.157; //Si lleva entre 3 y 7 celulares, tiene descuento de 15.7%
          }elseif ($cantidad>=8 && $cantidad<=15) {
            $descuento = 0.265; //Si lleva entre 8 y 15 celulares, tiene descuento de 26.5%
          }else{
            $descuento = 0.295; //Si lleva más 15 celulares, tiene descuento de 29.5%
          }
          $descuento_total = round(($total_SinDescuento*$descuento)*100)/100;
          $total_ConDescuento = round(($total_SinDescuento - $descuento_total)*100)/100;
          echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Cantidad: $cantidad celulares </span><br>";
          echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Precio Unitario: $$precio </span><br>";
          echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Total sin descuento: $$total_SinDescuento </span><br>";
          echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Descuento: $$descuento_total </span><br>";
          echo "<span style=\"color:black;font:bold 15pt 'Lucida Sans';\">Total a pagar: $$total_ConDescuento </span><br>";
          echo "<span style=\"color:Green;font:bold 15pt 'Lucida Sans';\"><a
          href=\"{$_SERVER['PHP_SELF']}\">Calcular nuevo total</a>";
        }
        endif;
        ?>
    </div>
  </body>
</html>
