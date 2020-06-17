<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
    scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <link rel="stylesheet" href="css/formstyle.css">
    <title>Ejercicio 1</title>
  </head>
  <body>
    <h1>Ejercicio 1</h1>
    <div id="formarea">
      <?php
        if(!isset($_POST['Enviar'])): //Si la variable no está definida, entonces no hará nada
       ?>
       <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" name="frmejercicio1">
         <h2>Información de pago</h2>
         <span>
           <label>Precio de producto:</label>&nbsp;&nbsp;
         </span> <!--Input de tipo número con incremento de 0.1 para definir el precio del producto-->
         <input type="number" name="precio" value="" min="0" step="0.01" /><br><br>
         <span> <!--Input de tipo número con incremento de 1 para definir la cantidad a llevar del producto-->
           <label>Cantidad a llevar:</label>&nbsp;&nbsp;
         </span>
         <input type="number" name="cantidad" value="" min="0" step="1" /><br><br>
         <span>
           <label>Método de pago:</label>
         </span> <!--El name servirá pra hacer referencia a la opción dentro de una variable-->
         <select name="tipo_pago" id="input"> <!--Los values servirán para hacer el switch-->
           <option value="0">Efectivo</option>
           <option value="1">Cheque</option>
           <option value="2">Tarjeta de Crédito</option>
         </select><br><br>
         <input type="submit" name="Enviar" value="Enviar">
       </form>
       <?php
     else://Si la variable está asignada, entonces se procede con el cálculo
        //Asignación de variables que se utilizarán para comparar
          $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
          $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
          $tipo_pago = isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : 0;
          //La función round permitirá redondear a 2 cifras
          $total_SinDescuento = round(($precio * $cantidad)*100)/100; //Se estima el monto a pagar sin descuento
          switch($tipo_pago){ //Cantidad a descontar según tipo de pago
            case 0: $descuento = 0.124; break; //12.4%
            case 1: $descuento = 0.086; break; //8.6%
            case 2: $descuento = 0.0421; break; //4.21%
          }
          //Se estima la cantidad de euros que deberán ser descontados
          $descuento_total = round(($total_SinDescuento*$descuento)*100)/100;
          //Se estima el total a pagar, ya con el descuento aplicado a la compra
          $total_ConDescuento = round(($total_SinDescuento - $descuento_total)*100)/100;
          //Se imprime en pantalla el resultado
          echo "<span style=\"color:black;font:bold 12pt 'Lucida Sans';\">Precio de productos sin descuento: €$total_SinDescuento euros </span><br><br>";
          echo "<span style=\"color:black;font:bold 12pt 'Lucida Sans';\">Descuento aplicado: €$descuento_total euros </span><br><br>";
          echo "<span style=\"color:black;font:bold 12pt 'Lucida Sans';\">TOTAL A PAGAR: €$total_ConDescuento euros </span><br><br>";
          echo "<span style=\"color:Green;font:bold 12pt 'Lucida Sans';\"><a
          href=\"{$_SERVER['PHP_SELF']}\">Calcular nuevo total</a>";
      endif;
        ?>
    </div>
  </body>
</html>
