<?php
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
}
?>
