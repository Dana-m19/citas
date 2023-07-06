<?php
$conexion = mysqli_connect("localhost", "root", "", "mym_asesores");

// Valores del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$rol = $_POST['rol'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$lugar_residencia = $_POST['lugar_residencia'];

// Valores de la tabla  formulario  del  registro
$sql = "INSERT INTO formulario_registro (nombre, apellidos, cedula, rol, email, telefono, direccion, lugar_residencia)
        VALUES ('$nombre', '$apellidos', '$cedula', '$rol', '$email', '$telefono', '$direccion', '$lugar_residencia')";

if ($conexion->query($sql) === TRUE) {
    $mensaje = "Registro exitoso";
} else {
    $error = "Error al registrar: " . $conexion->error;
}

// Valores del formulario de calificación
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$servicio = $_POST['servicio'];
$calificacion = $_POST['calificacion'];
$comentario = $_POST['comentario'];

// Insertar los valores en la tabla "Calificacion"
$sql = "INSERT INTO Calificacion_servicio (nombre, email, servicio, calificacion, comentario)
        VALUES ('$nombre', '$email', '$servicio', '$calificacion', '$comentario')";

if ($conexion->query($sql) === TRUE) {
    $mensaje = "Calificación enviada";
} else {
    $error = "Error al enviar calificación: " . $conexion->error;
}

// Valores del formulario de agendamiento
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$fecha_agenda = $_POST['fecha-agenda'];
$hora_agenda = $_POST['hora_agenda'];

// Insertar los valores en la tabla "Cita"
$sql = "INSERT INTO cita_agendada(nombre, email, fecha_agenda, hora_agenda)
        VALUES ('$nombre', '$email', '$fecha_agenda', '$hora_agenda')";

if ($conexion->query($sql) === TRUE) {
    $mensaje = "Cita agendada";
} else {
    $error = "Error al agendar cita: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>conexion</title>
</head>
<body>
<!-- Mensaje de éxito del formulario -->
<h2><?php echo isset($mensaje) ? $mensaje : ''; ?></h2>

<!-- Mensaje de error del formulario -->
<h2><?php echo isset($error) ? $error : ''; ?></h2>
</body>
</html>