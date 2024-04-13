<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema Integral AIVI</title>
    <link rel="icon" type="image/png" href="../img/isoazul.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/Login/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">  
            <div class="col-md-6 fondo-imagen" style="background-image: url('img/loginfondo1.jpeg');"></div>
            <div class="col-md-6 formulario-columna">
                <div class="formulario-container">
                    <img src="img/logoblanco.png" class="imagen-logo" width="50px">
                    <h2 class="text-center mb-4">Sistema Integral AIVI</h2>
                    <form action="#" method="post">
                        <div class="grupo-formulario mb-3">
                            <?php
                            // Mostrar mensaje de error si existe
                            if (isset($error)) {
                                echo "<p>Error: $error</p>";
                            }
                            ?>
                            <label for="usuario"><strong>Usuario</strong></label>
                            <input type="text" class="formulario-control" placeholder="Usuario" id="usuario" name="usuario">
                        </div>
                        <div class="grupo-formulario mb-3">
                            <label for="contrasena"><strong>Contraseña</strong></label>
                            <div class="input-group">
                                <input type="password" name="contrasena" class="form-control formulario-control" placeholder="Contraseña" id="contrasena">
                                <button class="btn btn-outline-secondary" type="button" id="mostrar-ocultar-contrasena">
                                    <i class="bi bi-eye" id="icono-ojo"></i>
                                </button>
                            </div>
                        </div>
                        <div class="grupo-formulario mb-3">
                            <a href="./CambiarContrasena.php" class="olvidar-contrasena">¿Olvidaste tu contraseña?</a>
                        </div>
                        <input type="submit" value="Iniciar Sesión" class="boton-inicio-sesion" name="btningresar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JS -->
    <script src="js/Login/login.js"></script>
</body>
</html>
