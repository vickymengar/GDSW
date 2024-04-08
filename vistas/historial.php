<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/historial.css">
    <link rel="icon" href="../img/isoazul.png">
    <title>Historiales médicos</title>
    
</head>
<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="../img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="./index.php">Inicio</a>
            <a href="./pacientes.php">Pacientes</a>
            <a href="./citas.php">Citas</a>
            <a href="./receta.php">Recetas</a>
            <a href="./historial.php">Historiales</a>
            <a href="#">Cerrar sesión</a>
        </nav>
    </div>

    <div class="box-container2" id="box-container">
        <div class="box" onclick="mostrarContenido(1)">
            <img src="../img/isoblanco.png" alt="">
            <h3>Historiales</h3>
        </div>

        <div class="box" onclick="mostrarContenido(2)">
            <img src="../img/isoblanco.png" alt="">
            <h3>Crear historial</h3>
        </div>
    </div>

    <div class="contenido" id="contenido-1">
        <div class="container">
            <div id="tabla-container"></div>
        </div>
    </div>

    <div class="contenido" id="contenido-2">
        <div class="container">
            <div class="progress-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>
            <form id="form-fases">
                <div class="fase" id="fase-1">
                    <h3>Datos de identificación</h3>
                    <label for="fecha_realizacion">Fecha de realización:</label>
                    <input type="text" id="fecha_realizacion" name="fecha_realizacion"><br><br>
                    
                    <label for="hora">Hora:</label>
                    <input type="text" id="hora" name="hora"><br><br>
                    
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>
                    
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad"><br><br>
                    
                    <label for="nombre">Nombre y apellidos:</label>
                    <input type="text" id="nombre" name="nombre"><br><br>
                    
                    <label for="estado_civil">Estado civil:</label>
                    <input type="text" id="estado_civil" name="estado_civil"><br><br>
                    
                    <label for="num_hijos">Número de hijos:</label>
                    <input type="text" id="num_hijos" name="num_hijos"><br><br>
                    
                    <label for="procedencia">Procedencia:</label>
                    <input type="text" id="procedencia" name="procedencia"><br><br>
                    
                    <label for="residencias_ant">Residencias anteriores:</label>
                    <input type="text" id="residencias_ant" name="residencias_ant"><br><br>
                    
                    <label for="lugar_origen">Lugar de origen:</label>
                    <input type="text" id="lugar_origen" name="lugar_origen"><br><br>
                    
                    <label for="religion">Religión:</label>
                    <input type="text" id="religion" name="religion"><br><br>
                    
                    <label for="escolaridad">Escolaridad:</label>
                    <input type="text" id="escolaridad" name="escolaridad"><br><br>
                    
                    <label for="ocupacion">Ocupación:</label>
                    <input type="text" id="ocupacion" name="ocupacion"><br><br>
                    
                    <label for="grupo_sanguineo">Grupo sanguíneo:</label>
                    <input type="text" id="grupo_sanguineo" name="grupo_sanguineo"><br><br>
                    
                    <label for="rh">R.H.:</label>
                    <input type="text" id="rh" name="rh"><br><br>
                    
                    <label for="acompanante">Acompañante:</label>
                    <input type="text" id="acompanante" name="acompanante"><br><br>
                    
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-2" style="display: none;">
                    <h3>Motivo de consulta</h3>
                    <textarea id="motivo_consulta" name="motivo_consulta" rows="4" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-4" style="display: none;">
                    <h2>Antecedentes</h2>
                        <h3>Antecedentes personales:</h3>
                            <h4>Patológicos</h4>
                                <label for="patologicos_hipertension">Hipertensión Arterial:</label>
                                <input type="radio" id="patologicos_hipertension_si" name="patologicos_hipertension" value="si">
                                <label for="patologicos_hipertension_si">Sí</label>
                                <input type="radio" id="patologicos_hipertension_no" name="patologicos_hipertension" value="no">
                                <label for="patologicos_hipertension_no">No</label><br><br>
                            <h4>Quirúrgicos</h4>    
                                <label for="quirurgicos">Quirúrgicos:</label><br>
                                <textarea id="quirurgicos" name="quirurgicos" rows="4" cols="50"></textarea><br><br>
                            <h4>Traumatismos</h4>  
                                <label for="traumatismos">Traumatismos:</label><br>
                                <textarea id="traumatismos" name="traumatismos" rows="4" cols="50"></textarea><br><br>
                            <h4>Transfusiones</h4>  
                                <label for="transfusiones">Transfusiones:</label><br>
                                <textarea id="transfusiones" name="transfusiones" rows="4" cols="50"></textarea><br><br>
                            <h4>Inmunizaciones</h4>  
                                <label for="inmunizaciones">Inmunizaciones:</label><br>
                                <textarea id="inmunizaciones" name="inmunizaciones" rows="4" cols="50"></textarea><br><br>
    
                                <label for="hospitalizaciones">Hospitalizaciones:</label><br>
                                <textarea id="hospitalizaciones" name="hospitalizaciones" rows="4" cols="50"></textarea><br><br>
    
                                <label for="farmacologicos">Farmacológicos (tratamiento y dosis):</label><br>
                                <textarea id="farmacologicos" name="farmacologicos" rows="4" cols="50"></textarea><br><br>
    
                                <label for="alergicos_alimentos">Alérgicos - Alimentos:</label><br>
                                <textarea id="alergicos_alimentos" name="alergicos_alimentos" rows="4" cols="50"></textarea><br><br>
    
                                <label for="alergicos_medicamentos">Alérgicos - Medicamentos:</label><br>
                                <textarea id="alergicos_medicamentos" name="alergicos_medicamentos" rows="4" cols="50"></textarea><br><br>
    
                                <label for="alergicos_contacto">Alérgicos - Contacto o Superficie:</label><br>
                                <textarea id="alergicos_contacto" name="alergicos_contacto" rows="4" cols="50"></textarea><br><br>
    
                                <label for="alergicos_ambientales">Alérgicos - Sustancias ambientales:</label><br>
                                <textarea id="alergicos_ambientales" name="alergicos_ambientales" rows="4" cols="50"></textarea><br><br>
    
                                <label for="sarampion">Sarampión:</label>
                                <input type="radio" id="sarampion_si" name="sarampion" value="si">
                                <label for="sarampion_si">Sí</label>
                                <input type="radio" id="sarampion_no" name="sarampion" value="no">
                            <label for="sarampion_no">No</label><br><br>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="nextFase()">Siguiente</button>
                </div>
                <div class="fase" id="fase-3" style="display: none;">
                    <h3>Enfermedad actual</h3>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" rows="8" cols="50"></textarea>
                    <button onclick="previousFase()">Anterior</button>
                    <button onclick="submitForm()">Guardar</button>
                </div>
            </form>
        </div>
    </div>


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

    <script src="../js/historial.js"></script>
</body>
</html>