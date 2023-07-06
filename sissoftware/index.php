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

// conexion del formulario


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $servicio = $_POST['servicio'];
    $calificacion = $_POST['calificacion'];
    $comentario = $_POST['comentario'];

    $query = "INSERT INTO calificacion_servicio (nombre, email, servicio, calificacion, comentario) VALUES (:nombre, :email, :servicio, :calificacion, :comentario)";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':servicio', $servicio);
    $statement->bindParam(':calificacion', $calificacion);
    $statement->bindParam(':comentario', $comentario);

    if ($statement->execute()) {
        echo "SU CALIFICACION SE HA ENVIADO CORRECTAMENTE  :)" ;
        exit();
       
       
    } else {
        echo "Hubo un error al insertar los datos.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/a9faf4c811.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="./img/Logo_mymedi.png">
    <title>mym asesores e inversores</title>
    <hr>
</head>

<body>
    <header>
        <h1>MYM ASESORES E INVERSORES</h1>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="./paginasphp/agendamiento.php">Agendamiento</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="./paginasphp/iniciosesion.php">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="banner">
        <center><img src="./img/Logo_mymedi.png" alt="Logo de la empresa"></center>
    </div>
    <hr>
    <hr>


    <div class="container">
        <section class="services" id="services">

            <!--listado de servicios prestados-->

            <h2>Nuestros Servicios</h2><br>

            <table class="tabla-img">
                <tr>
                    <td>
                        <a href="./paginasphp/servicios.php">
                            <h3><b>Asesoría juridica</b></h3>
                        </a>
                        <img src="./img/asesoriajuridica6.png" alt="imagen asesoria juridica" class="border-img">
                    </td>
                    <td><a href="./paginasphp/servicios.php">
                            <h3><b>Asesoría Comercial</b></h3>
                        </a>
                        <img src="./img/ascomercialimg.jpg" alt="imagen asesoria Comercial" class="border-img">
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="./paginasphp/servicios.php">
                            <h3><b>Asesoría Contable</b></h3>
                        </a>
                        <img src="./img/ascontablemg.jpg" alt="imagen asesoria Contable" class="border-img">
                    </td>
                    <td>
                        <a href="./paginasphp/servicios.php">
                            <h3><b>Asesoría Tributaria</b></h3>
                        </a>
                        <img src="./img/astributariaimg.jpg" alt="imagen asesoria tributaria" class="border-img">
                    </td>
                </tr>
            </table>
        </section>
        <!--informacion sobre  nosotros-->
        <section id="nosotros">
            <h2>Nosotros</h2>
            <div class="mission-vision">
                <div class="mission">
                    <h3>Misión</h3>
                    <p>Brindar servicio de asesoría y acompañamiento en trámites contables, jurídicos y comerciales.</p>
                </div>
                <div class="vision">
                    <h3>Visión</h3>
                    <p>Ampliar nuestra prestación de servicio a nivel internacional.</p>
                </div>
            </div>

            <div class="experience">
                <h3>Experiencia</h3>
                <p>Somos una empresa de Contadores, Abogados y Asesores Comerciales, Capacitados con la mejor formación académica y contamos con una <br> experiencia altamente calificada de más de 7 años de servicio.</p>



                <div class="statistics">
                    <div class="stat">
                        <h4>87%</h4>
                        <p>Eficacia</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 87%">87%</div>
                        </div>
                    </div>
                    <div class="stat">
                        <h4>80%</h4>
                        <p>Experiencia</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 80%">80%</div>
                        </div>
                    </div>
                    <div class="stat">
                        <h4>76%</h4>
                        <p>Casos</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 80%">76%</div>
                        </div>
                    </div>
                    <div class="stat">
                        <h4>85%</h4>
                        <p>Satisfacción</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 85%">85%</div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!--seccion del  boton de agendamiento-->
        <section class="booking">

            <h2>Agendamiento</h2>
            <a href="./paginasphp/agendamiento.php">
                <button type="button" class="boton"><b>AGENDAR</b></button>
                <br>
                <br>
                <div class="spinner-grow" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </a>
            <?php
            // código de PHP para el agendamiento de usuarios
            ?>

        </section>

        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="company-info">
                        <h2>MYM ASESORES E INVERSORES</h2>
                        <p>Capacitados con la mejor formación académica <br>
                            y contamos con una experiencia altamente calificada <br>
                            de más de 7 años de servicio.</p>
                    </div>
                    <div class="menu-links">
                        <h2>Menú</h2>
                        <ul>
                            <li><a href="#nosotros">Nosotros</a></li>
                            <li><a href="#contacto">Contacto</a></li>
                            <li><a href="./paginasphp/politica.php">Política de privacidad</a></li>
                        </ul>
                    </div>
                    <img src="./img/iconofooter2.png" alt="logo footer" width="80px" height="80px">


                    <div class="contact-info" id="contacto">
                        <h2>Contacto</h2>
                        <ul>
                            <li><i class="fas fa-phone"></i> +57 312 565 0116 - 3184876005</li>
                            <li><i class="fas fa-envelope"></i> mymasesores.inversores@gmail.com</li>
                            <li><i class="fas fa-map-marker-alt"></i> Calle 16 # 9 103 Of. 312 Edificio Arista Business Center</li>
                        </ul>
                    </div>
                    <div class="social-media">
                        <h2>Síguenos</h2>
                        <ul>
                            <li><a href="https://www.facebook.com/MyMasesoresT"><i class="fa-brands fa-facebook fa-beat "></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram fa-beat "></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=573125650116"><i class="fa-brands fa-whatsapp fa-beat "></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter fa-beat "></i></a></li>
                        </ul>
                    </div>
                    <img src="./img/iconofooter.png" alt="icono footer" width="50px" height="50px">


                </div>


                <!--formulario de calificaciones del servicio-->

                <div id="calificacion">
                    <div class="container ">
                        <h1>
                            Calificanos

                        </h1>

                        <form method="POST" action="index.php">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="servicio">Servicio:</label>
                                <select id="servicio" name="servicio" class="form-control" required>
                                    <option value="juridicas">Asesorías Jurídicas</option>
                                    <option value="contables">Asesorías Contables</option>
                                    <option value="comerciales">Asesorías Comerciales</option>
                                    <option value="tributarias">Asesorías Tributarias</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="calificacion">Calificación:</label>
                                <input type="number" id="calificacion" name="calificacion" class="form-control" min="1" max="10" required>
                            </div>
                            <div class="form-group">
                                <label for="comentario">Comentario:</label>
                                <textarea id="comentario" name="comentario" class="form-control" rows="3"></textarea>
                            </div>
                            <br>
                            <form action="./index.php">
                            <button  type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                            </form>
                        </form>

                    </div>
                    <hr>
                    <div class="bottom-footer">
                        <p>&copy; 2023 Mym asesores e inverores  | Todos los Derechos Reservados </p>
                    </div>
                </div>
            </div>
        </footer>

<!--codigo  de  crud-->



</body>

</html>










