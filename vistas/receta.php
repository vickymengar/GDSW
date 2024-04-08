<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="icon" href="../img/isoblanco.png">
    <title>Recetas</title>
    
</head>
<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="../img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="./index.php">Inicio</a>
            <a href="#">Pacientes</a>
            <a href="#">Citas</a>
            <a href="./receta.php">Recetas</a>
            <a href="#">Tratamientos</a>
            <a href="#">Historiales</a>
            <a href="#">Cerrar sesión</a>
        </nav>
    </div>

    <div class="container">
        <header>AIVI</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Médico</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nombre Del Médico</label>
                            <input type="text" placeholder="Ingrese Sus Nombre" required>
                        </div>

                        <div class="input-field">
                            <label>Cedula Profesional</label>
                            <input type="number" placeholder="Ingrese Sus Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Fecha</label>
                            <input type="date" placeholder="Ingrese Los Datos" required>
                        </div>

                    </div>
                </div>

                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nombre Del Paciente</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Peso</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Temperatura</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Talla</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>T/A</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                    </div>
                </div>

                <div class="details diagnostico-form"> <!-- Datos de diagnóstico -->
                    <span class="title">DIagnóstico Medico</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Diagnóstico Dx</label>
                            <textarea placeholder="Ingrese el diagnóstico" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="boton efecto3">
                Guardar Receta
            </a>
        </form>
    </div>
</body>
<footer class="footer">
    <img src="..//img/logoblanco.png" alt="" class="logof">
    <div class="social-icons-container">
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
    </div>
    <ul class="footer-menu-container">
        <li class="menu-item">Legal</li>
        <li class="menu-item">cookies</li>
        <li class="menu-item">Privacidad</li>
        <li class="menu-item">Inicio</li>
    </ul>
    <span class="copyright">&copy;2024, Uptx, Derechos reservados.</span>
</footer>
</html>