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
    <?php if(isset($_GET['empleados']) && $_GET['empleados'] > 0) : ?>
        <h1>Ingresar datos de empleados</h1>
        <form class="informacionEmpleados" action="planilla.php" method="post">
            <table>
                <tr>
                    <th class="id">Id</th>
                    <th class="nombre">Nombre</th>
                    <th class="cargo">Cargo en la empresa</th>
                    <th class="horas">Horas trabajadas</th>
                </tr>
            </table>
            <?php
                for($i = 1; $i<=$empleados; $i++){
                    echo "<div class='datosEmpleados'>";
                    echo "<span>$i.- </span>";
                    echo "<input type='hidden' class='id' name='empleados' value='$empleados'>";
                    echo "<input type='text' class='nombre' name='" . $i . "nombre' placeholder='Nombre completo:' required>";
                    echo "<input type='text' class='cargo' name='" . $i . "cargo' placeholder='Cargo:' required>";
                    echo "<input type='number' class='horas' name='" . $i . "horas' placeholder='Horas:' min='0' step='0.1' required>";
                    echo "</div>";
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php else : ?>
        <h1>Numero de empleados</h1>
        <form class="obtenerEmpleados" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <input type="number" name="empleados" placeholder="Número de empleados:" min="1" required>
            <input type="submit" value="Enviar">
        </form>
    <?php endif ?>
</body>
</html>
