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


$stmt = null;  // Declaración de la variable $stmt

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   
  $username = $_POST['username'];
      
     
  $password = $_POST['password'];
      
     
  $rol = $_POST['rol'];
  
  
      
  
  // Realizar las validaciones y verificación de datos si es necesario
  
      
  
     
  
  
  // Insertar los datos en la base de datos
      
     
  $sql = "INSERT INTO inicio_sesion(usuario, contraseña, rol) VALUES (:usuario, :contraseña, :rol)";
      
      $
  $stmt =  $conexion->prepare("SELECT * FROM inicio_sesion ");
      
     
  if ($stmt) {
    $stmt->bindParam(':usuario', $username);
    $stmt->bindParam(':contraseña', $password);
    $stmt->bindParam(':rol', $rol);
    $stmt->execute();
} else {
    // Manejar el caso cuando la preparación de la consulta falla
    echo "Error en la preparación de la consulta";
}

  
      
  
  // Redirigir a otra página o mostrar un mensaje de éxito
      header('Location: mensajex.php');
      exit;
  }
?>






<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesión</title>
  <link rel="stylesheet"  href="../iniciosesion.css">
  <script src="https://kit.fontawesome.com/a9faf4c811.js" crossorigin="anonymous"></script>
  <link rel="icon" href="../img/Logo_mymedi.png">
</head>
<body><br><br>

<!--boton de regreso-->

<button class="back_button" onclick="goBack()">&#8678; Regresar</button>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>

  
   

<center><img src="../img/Logo_mymedi.png" alt="logo empresa" width="100px" height="100px"></center>


  <h1>INICIAR SESION</h1><br>

 

  <?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="POST" action="iniciosesion.php"><br>
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="rol">Rol:</label>
    <select id="rol" name="rol">
      <option value="cliente">Cliente</option>
      <option value="programador">Programador</option>
      <option value="administrador">Administrador</option>
    </select><br><br>

    <button type="submit">Iniciar sesión</button>
    <br>
    <a href="../paginasphp/registrarse.php">Registrarse</a>

  </form>
  

</body>
</html>
