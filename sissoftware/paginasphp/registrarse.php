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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $lugar_residencia = $_POST['lugar_residencia'];

    $sql = "INSERT INTO formulario (nombre, apellidos, cedula, rol, email, telefono, direccion, lugar_residencia)
            VALUES (:nombre, :apellidos, :cedula, :rol, :email, :telefono, :direccion, :lugar_residencia)";

    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':rol', $rol);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':lugar_residencia', $lugar_residencia);

    try {
        $stmt->execute();
        $mensaje = "Registro exitoso";
    } catch (Exception $ex) {
        $error = "Error al registrar: " . $ex->getMessage();
    }
}



?>
<!-- INICIO  HTML -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../registrarse.css">
    <link rel="icon" href="../img/Logo_mymedi.png">
</head>

<body>

    <!--boton de regreso--> 

    <button class="back_button" onclick="goBack()">&#8678; Regresar</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <center><img src="../img/Logo_mymedi.png" alt="logo empresa" width="150px"></center>
    <br>
    <h1>REGISTRARSE</h1>
    <p><b>
            <center>Señor usurio si no tiene una cuenta registrada <br>ingrese los siguientes datos y siga los pasos.</center>
        </b></p>

    <?php if (isset($mensaje)) : ?>
        <div class="mensaje-exito"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="mensaje-error"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="form1">

    <!-- Modificación en el formulario -->

    <form method="POST" action="registrarse.php" target="_blank"><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br>

            <label for="cedula">N° Cedula:</label>
            <input type="text" id="cedula" name="cedula" required><br>

            <label for="rol">Rol:</label>
            <select id="rol" name="rol">
                <option value="cliente">Cliente</option>
                <option value="programador">Programador</option>
                <option value="administrador">Administrador</option>
                </select><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required><br>

                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" required><br>

                <label for="lugar_residencia">Lugar de residencia:</label>
                <input type="text" id="lugar_residencia" name="lugar_residencia" required><br>


                <br>
                <button type="submit">Registrarse y Obtener Cita</button>
        </form>
    </div>
</body>

</html>