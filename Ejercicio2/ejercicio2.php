<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
    scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 2</title>
  </head>
  <body>
    <div class="main">
      <?php
        if(!isset($_POST['Enviar'])):
       ?>
       <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" name="frmejercicio2">
         <h2>Información de pago</h2>
         <span>
           <label>Cantidad de celulares:</label>&nbsp;&nbsp;
         </span> <!--Input de tipo número con incremento de 1 para definir la cantidad de celulares a llevar-->
         <input type="number" name="cantidad" value="" min="0" step="1" /><br><br>
         <span> <!--Input de tipo número con incremento de 0.1 para definir el precio unitario de los celulares-->
           <label>Precio Unitario:</label>&nbsp;&nbsp;
         </span>
         <input type="number" name="precio" value="" min="0" step="0.1" /><br><br>
         <input type="submit" name="Enviar" value="Enviar">
       </form>
       <?php
        else:
          $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
          $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
          $total_SinDescuento = round(($cantidad*$precio)*100)/100;
          if($cantidad>=3 && $cantidad<=7){
            $descuento = 0.157;
          }elseif ($cantidad>=8 && $cantidad<=15) {
            $descuento = 0.265;
          }else{
            $descuento = 0.295;
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
        endif;
        ?>
    </div>
  </body>
</html>