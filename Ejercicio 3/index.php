<?php

if(isset($_GET['alumnos'])) {
    $alumnos = $_GET['alumnos'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php if(isset($_GET['alumnos'])) : ?>
        <h1>Evaluar alumnos</h1>
        <form action="resultados.php" method="post">
            <table>
                <tr>
                    <th>Carnet</th>
                    <th>Nombre</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                </tr>
            </table>
            <?php
                for($i = 1; $i<=$alumnos; $i++){
                    echo "<div class='datos_alumno'>";
                    echo "<span>$i.- </span>";
                    echo "<input type='hidden' name='alumnos' value='$alumnos'>";
                    echo "<input type='text' name='" . $i . "carnet' placeholder='Carnet:'>";
                    echo "<input type='text' name='" . $i . "nombre' placeholder='Nombre completo:'>";
                    echo "<input type='number' name='" . $i . "nota1' placeholder='Nota 1:' min='0' max='10' step='0.1'>";
                    echo "<input type='number' name='" . $i . "nota2' placeholder='Nota 2:' min='0' max='10' step='0.1'>";
                    echo "<input type='number' name='" . $i . "nota3' placeholder='Nota 3:' min='0' max='10' step='0.1'>";
                    echo "</div>";
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php else : ?>
        <h1>Número de alumnos a evaluar</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <input type="number" name="alumnos" placeholder="Número de alumnos:" min="0">
            <input type="submit" value="Enviar">
        </form>
    <?php endif ?>
</body>
</html>
