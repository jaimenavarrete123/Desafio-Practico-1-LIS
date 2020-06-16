<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alumnos = (int)$_POST['alumnos'];
    $aprobados = 0;
    $reprobados = 0;
    $posMax = 0;
    $max = 0;
    $posMin = 0;
    $min = 10;

    for($i = 1; $i<=$alumnos; $i++){
        $carnet[$i] = $_POST[$i . 'carnet'];
        $nombre[$i] = $_POST[$i . 'nombre'];
        $nota1[$i] = $_POST[$i . 'nota1'];
        $nota2[$i] = $_POST[$i . 'nota2'];
        $nota3[$i] = $_POST[$i . 'nota3'];

        $promedio[$i] = round(($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3, 2);
        
        if($promedio[$i] >= 6.5) {
            $estado[$i] = "Aprobado";
            $aprobados++;
        }
        else {
            $estado[$i] = "Reprobado";
            $reprobados++;
        }

        $porcentajeAprobados = round($aprobados / $alumnos * 100, 2);
        $porcentajeReprobados = round(100 - $porcentajeAprobados, 2);

        if($promedio[$i] > $max) {
            $posMax = $i;
            $max = $promedio[$i];
        }
        if($promedio[$i] < $min) {
            $posMin = $i;
            $min = $promedio[$i];
        }
    }
}
else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Notas de alumnos</title>
</head>
<body>
    <h1>Resultados del grupo de alumnos</h1>
    <table>
        <tr>
            <th>Carnet:</th>
            <th>Nombre:</th>
            <th>Nota1:</th>
            <th>Nota2:</th>
            <th>Nota3:</th>
            <th>Promedio:</th>
        </tr>

        <?php    
            for($i = 1; $i<=$alumnos; $i++){
                echo "<tr>";
                echo "<td>$carnet[$i]</td>";
                echo "<td>$nombre[$i]</td>";
                echo "<td>$nota1[$i]</td>";
                echo "<td>$nota2[$i]</td>";
                echo "<td>$nota3[$i]</td>";
                echo "<td>$promedio[$i]</td>";
                echo "<td>$estado[$i]</td>";
                echo "</tr>";
            }       
        ?>

    </table>

    <div class="wrapper">
        <p>Porcentaje de alumnos aprobados: <?php echo $porcentajeAprobados; ?>%</p>
        <p>Porcentaje de alumnos reprobados: <?php echo $porcentajeReprobados; ?>%</p>
        <p>El alumno con mayor promedio: <?php echo strtoupper($nombre[$posMax]) . ' con promedio de ' . $promedio[$posMax]; ?></p>
        <p>El alumno con menor promedio: <?php echo strtoupper($nombre[$posMin]) . ' con promedio de ' . $promedio[$posMin]; ?></p>
    </div>
</body>
</html>