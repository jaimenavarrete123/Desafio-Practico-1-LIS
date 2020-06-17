<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empleados = $_POST['empleados'];
    $pago = 5;
    $total = 0;
    $totalNeto = 0;

    for($i = 1; $i <= $empleados; $i++) {
        $nombre[$i] = $_POST[$i . 'nombre'];
        $cargo[$i] = $_POST[$i . 'cargo'];
        $horas[$i] = $_POST[$i . 'horas'];

        if($horas[$i] <= 40) {
            $salario[$i] = round($pago * $horas[$i], 2);
        }
        else {
            $salario[$i] = round($pago * 40 + $pago * ($horas[$i] - 40) * 1.25, 2);
        }

        $salarioNeto[$i] = round($salario[$i] * 0.8975, 2);

        $total += $salario[$i];
        $totalNeto += $salarioNeto[$i];
    }
}
else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilla de empleados</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Planilla de pagos para empleados</h1>
    <table class="tablaResultados">
        <tr>
            <th class="id">Numero</th>
            <th class="nombre">Nombre</th>
            <th class="cargo">Cargo en la empresa</th>
            <th class="horas">Horas trabajadas</th>
            <th>Salario sin descuento</th>
            <th>Salario con descuento</th>
        </tr>
        <?php
        
            for($i = 1; $i <= $empleados; $i++) {
                echo '<tr>';
                echo "<td>$i</td>";
                echo "<td>$nombre[$i]</td>";
                echo "<td>$cargo[$i]</td>";
                echo "<td>$horas[$i]</td>";
                echo "<td>$salario[$i]</td>";
                echo "<td>$salarioNeto[$i]</td>";
                echo '</tr>';
            }
        
        ?>
    </table>
    <div class="wrapper">
        <p>Total de empleados: <span class="datos"><?php echo $empleados; ?></span></p>
        <p>Total a pagar en salarios (sin descuentos): <span class="datos">$<?php echo $total; ?></span></p>
        <p>Total a pagar en salarios netos (con descuentos): <span class="datos">$<?php echo $totalNeto; ?></span></p>
    </div>
</body>
</html>