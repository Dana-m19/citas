<?php
session_start();


$host = "localhost";
$bd = "mym_asesores";
$usuario = "root";
$password = "";

try {
     $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $password);
     if ($conexion) {
         echo "";
     }
} catch (Exception $ex) {
     echo $ex->getMessage();
     exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono= $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Validar los datos básicos
    if (empty($nombre) || empty($telefono) || empty($email) || empty($fecha) || empty($hora)) {
        $error = "Por favor, completa todos los campos correctamente.";
    } else {
        try {
            // Preparar la consulta SQL
            $consulta = $conexion->prepare("INSERT INTO cita (nombre,telefono, email, fecha, hora) VALUES (:nombre,:telefono, :email, :fecha, :hora)");

            // Asignar los valores a los parámetros de la consulta
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':fecha', $fecha);
            $consulta->bindParam(':hora', $hora);

            // Ejecutar la consulta
            $consulta->execute();

            // Mostrar mensaje de éxito
            $mensaje = "MYM ASESORES E INVERSORES le informa su cita fue agendada correctamente. Nos pondremos en contacto contigo lo más pronto.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../agendamiento.css">
    <script src="https://kit.fontawesome.com/a9faf4c811.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../img/Logo_mymedi.png">
    <title>Agenda tu cita</title>
</head>

<body>

    <!--boton de regreso-->

    <button class="back_button" onclick="goBack()">&#8678; Regresar</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!--titulo de la pagina agendamiento-->
    <h1>
        <center>AGENDA TU CITA</center>
    </h1>
    <div class="todo">
        <div class="columna1">
            <center><img src="../img/Logo_mymedi.png" alt="logo empresa" width="150px" height="150px"></center>

            <br><br>
            <h2>MYM ASESORES E INVERSORES</h2><br>
            <p>Capacitados con la mejor formación académica y contamos con una experiencia altamente calificada de más de 7 años de servicio.</p>
            <ul>


                <li>Eficiencia en atención personalizada.</li>
                <li>Asesoría con profesionales calificados</li>
                <li>Alta experiencia y formación acádemica</li>
                <li>Asesoría Comercial, gestión y trámites</li>
                <li>Manejo de Sotfware Contables, Asesoría tributaria.</li>
            </ul>


            <?php
            // código de PHP para el agendamiento de usuarios
            if (isset($mensaje)) : ?>
                <div class="mensaje-exito"><?php echo $mensaje; ?></div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="mensaje-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <br>
            <br>
        </div>
        <div class="columna2">
            <form method="POST" action="agendamiento.php"><br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required><br>

                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required><br>

                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" required><br>
                <br>
                <button type="submit">Agendar Cita</button>
            </form>
            </section>
        </div>
    </div>
</body>

</html>