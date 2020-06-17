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
        <form class="informacionAlumnos" action="resultados.php" method="post">
            <table>
                <tr>
                    <th class="id">Id</th>
                    <th class="carnet">Carnet</th>
                    <th class="nombre">Nombre</th>
                    <th class="nota1">Nota 1</th>
                    <th class="nota2">Nota 2</th>
                    <th class="nota3">Nota 3</th>
                </tr>
            </table>
            <?php
                for($i = 1; $i<=$alumnos; $i++){
                    echo "<div class='datos_alumno'>";
                    echo "<span class='id'>$i.- </span>";
                    echo "<input type='hidden' name='alumnos' value='$alumnos'>";
                    echo "<input type='text' class='carnet' name='" . $i . "carnet' placeholder='Carnet:' required>";
                    echo "<input type='text' class='nombre' name='" . $i . "nombre' placeholder='Nombre completo:' required>";
                    echo "<input type='number' class='nota1' name='" . $i . "nota1' placeholder='Nota 1:' min='0' max='10' step='0.1' required>";
                    echo "<input type='number' class='nota2' name='" . $i . "nota2' placeholder='Nota 2:' min='0' max='10' step='0.1' required>";
                    echo "<input type='number' class='nota3' name='" . $i . "nota3' placeholder='Nota 3:' min='0' max='10' step='0.1' required>";
                    echo "</div>";
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php else : ?>
        <h1>Número de alumnos a evaluar</h1>
        <form class="obtenerAlumnos" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <input type="number" name="alumnos" placeholder="Número de alumnos:" min="0" required>
            <input type="submit" value="Enviar">
        </form>
    <?php endif ?>
</body>
</html>
