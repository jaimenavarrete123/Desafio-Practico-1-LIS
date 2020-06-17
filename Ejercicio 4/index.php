<?php

if(isset($_GET['empleados'])) {
    $empleados = $_GET['empleados'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Empleados</title>
</head>
<body>
    <?php if(isset($_GET['empleados'])) : ?>
        <h1>Ingresar datos de empleados</h1>
        <form action="planilla.php" method="post">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Cargo en la empresa</th>
                    <th>Horas trabajadas</th>
                </tr>
            </table>
            <?php
                for($i = 1; $i<=$empleados; $i++){
                    echo "<div class='datos_empleados'>";
                    echo "<span>$i.- </span>";
                    echo "<input type='hidden' name='empleados' value='$empleados'>";
                    echo "<input type='text' name='" . $i . "nombre' placeholder='Nombre completo:'>";
                    echo "<input type='text' name='" . $i . "cargo' placeholder='Cargo en la empresa:'>";
                    echo "<input type='number' name='" . $i . "horas' placeholder='Horas trabajadas' min='0' step='0.1'>";
                    echo "</div>";
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php else : ?>
        <h1>Numero de empleados</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <input type="number" name="empleados" placeholder="Número de empleados:" min="0">
            <input type="submit" value="Enviar">
        </form>
    <?php endif ?>
</body>
</html>
