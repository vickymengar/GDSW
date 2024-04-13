-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2024 a las 21:28:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aivi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisiscaso`
--

CREATE TABLE `analisiscaso` (
  `ID_Paciente` int(11) DEFAULT NULL,
  `Texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedenteshereditarios`
--

CREATE TABLE `antecedenteshereditarios` (
  `ID_AntecedentesHereditarios` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `HipertensionArterial_Padre` tinyint(1) DEFAULT NULL,
  `HipertensionArterial_Madre` tinyint(1) DEFAULT NULL,
  `Diabetes_Padre` tinyint(1) DEFAULT NULL,
  `Diabetes_Madre` tinyint(1) DEFAULT NULL,
  `EnfermedadCoronaria_Padre` tinyint(1) DEFAULT NULL,
  `EnfermedadCoronaria_Madre` tinyint(1) DEFAULT NULL,
  `AccidenteCerebroVascular_Padre` tinyint(1) DEFAULT NULL,
  `AccidenteCerebroVascular_Madre` tinyint(1) DEFAULT NULL,
  `EnfermedadPulmonar_Padre` tinyint(1) DEFAULT NULL,
  `EnfermedadPulmonar_Madre` tinyint(1) DEFAULT NULL,
  `InfartoAgudoAlMiocardio_Padre` tinyint(1) DEFAULT NULL,
  `InfartoAgudoAlMiocardio_Madre` tinyint(1) DEFAULT NULL,
  `Hepatitis_Padre` tinyint(1) DEFAULT NULL,
  `Hepatitis_Madre` tinyint(1) DEFAULT NULL,
  `Hipercolesterolemia_Padre` tinyint(1) DEFAULT NULL,
  `Hipercolesterolemia_Madre` tinyint(1) DEFAULT NULL,
  `Cancer_Padre` tinyint(1) DEFAULT NULL,
  `Cancer_Madre` tinyint(1) DEFAULT NULL,
  `Otros_Padre` tinyint(1) DEFAULT NULL,
  `Otros_Padre_Descripcion` text DEFAULT NULL,
  `Otros_Madre` tinyint(1) DEFAULT NULL,
  `Otros_Madre_Descripcion` text DEFAULT NULL,
  `HipertensionArterial_Hermanos` tinyint(1) DEFAULT NULL,
  `Convulsiones_Hermanos` tinyint(1) DEFAULT NULL,
  `Diabetes_Hermanos` tinyint(1) DEFAULT NULL,
  `InfartoAgudoAlMiocardio_Hermanos` tinyint(1) DEFAULT NULL,
  `EnfermedadCoronaria_Hermanos` tinyint(1) DEFAULT NULL,
  `Hepatitis_Hermanos` tinyint(1) DEFAULT NULL,
  `Hipercolesterolemia_Hermanos` tinyint(1) DEFAULT NULL,
  `Cancer_Hermanos` tinyint(1) DEFAULT NULL,
  `AccidenteCerebroVascular_Hermanos` tinyint(1) DEFAULT NULL,
  `EnfermedadPulmonar_Hermanos` tinyint(1) DEFAULT NULL,
  `Otros_Hermanos` tinyint(1) DEFAULT NULL,
  `Otros_Hermanos_Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentespersonales`
--

CREATE TABLE `antecedentespersonales` (
  `ID_AntecedentesPersonales` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `HipertensionArterial` tinyint(1) DEFAULT NULL,
  `Nervioso` tinyint(1) DEFAULT NULL,
  `Diabetes` tinyint(1) DEFAULT NULL,
  `Anticoagulacion` tinyint(1) DEFAULT NULL,
  `Cancer` tinyint(1) DEFAULT NULL,
  `Hepatitis` tinyint(1) DEFAULT NULL,
  `Asma` tinyint(1) DEFAULT NULL,
  `Ginecologico` tinyint(1) DEFAULT NULL,
  `Tuberculosis` tinyint(1) DEFAULT NULL,
  `Neumonia` tinyint(1) DEFAULT NULL,
  `Obesidad` tinyint(1) DEFAULT NULL,
  `EnfermedadCoronaria` tinyint(1) DEFAULT NULL,
  `EnfermedadTiroides` tinyint(1) DEFAULT NULL,
  `EnfermedadCardiovascular` tinyint(1) DEFAULT NULL,
  `EnfermedadesTransmisionSexual` tinyint(1) DEFAULT NULL,
  `EnfermedadGastrointestinal` tinyint(1) DEFAULT NULL,
  `OtroPatologico` tinyint(1) DEFAULT NULL,
  `OtroPatologicoDescripcion` text DEFAULT NULL,
  `Quirurgicos` text DEFAULT NULL,
  `Traumatismos` text DEFAULT NULL,
  `Transfusiones` text DEFAULT NULL,
  `Inmunizaciones` text DEFAULT NULL,
  `Hospitalizaciones` text DEFAULT NULL,
  `Farmacologicos` text DEFAULT NULL,
  `AlergicosAlimentos` text DEFAULT NULL,
  `AlergicosMedicamentosos` text DEFAULT NULL,
  `AlergicosContacto` text DEFAULT NULL,
  `AlergicosAmbientales` text DEFAULT NULL,
  `InfanciaSarampion` tinyint(1) DEFAULT NULL,
  `InfanciaRubeola` tinyint(1) DEFAULT NULL,
  `InfanciaVaricela` tinyint(1) DEFAULT NULL,
  `InfanciaHepatitis` tinyint(1) DEFAULT NULL,
  `InfanciaOtro` tinyint(1) DEFAULT NULL,
  `InfanciaOtroDescripcion` text DEFAULT NULL,
  `Menarquia` varchar(100) DEFAULT NULL,
  `FechaUltimaMenstruacion` date DEFAULT NULL,
  `FechaUltimoParto` date DEFAULT NULL,
  `UsoAnticonceptivos` varchar(255) DEFAULT NULL,
  `ETS` varchar(255) DEFAULT NULL,
  `ParejasSexuales` int(11) DEFAULT NULL,
  `FechaUltimaCitologia` date DEFAULT NULL,
  `Alimentacion` varchar(255) DEFAULT NULL,
  `IntoleranciaAlimentos` varchar(255) DEFAULT NULL,
  `Apetito` varchar(100) DEFAULT NULL,
  `CatarsisIntestinal` varchar(100) DEFAULT NULL,
  `Diuresis` varchar(255) DEFAULT NULL,
  `Sueno` varchar(255) DEFAULT NULL,
  `BebidasAlcoholicas` varchar(100) DEFAULT NULL,
  `Infusiones` varchar(100) DEFAULT NULL,
  `Tabaco` varchar(100) DEFAULT NULL,
  `Drogas` varchar(100) DEFAULT NULL,
  `Medicamentos` varchar(255) DEFAULT NULL,
  `RelacionesSexuales` varchar(100) DEFAULT NULL,
  `ActividadFisica` varchar(100) DEFAULT NULL,
  `Personalidad` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentespsicosociales`
--

CREATE TABLE `antecedentespsicosociales` (
  `ID_AntecedentesPsicosociales` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Nacimiento` text DEFAULT NULL,
  `CrecimientoYMaduracion` text DEFAULT NULL,
  `CondicionDeLaVivienda` text DEFAULT NULL,
  `NoHabitantes` int(11) DEFAULT NULL,
  `Paredes` text DEFAULT NULL,
  `Piso` text DEFAULT NULL,
  `Techo` text DEFAULT NULL,
  `ServiciosAgua` tinyint(1) DEFAULT NULL,
  `ServiciosLuz` tinyint(1) DEFAULT NULL,
  `ServiciosRecBasura` tinyint(1) DEFAULT NULL,
  `ServiciosTV` tinyint(1) DEFAULT NULL,
  `ServiciosInternet` tinyint(1) DEFAULT NULL,
  `CaracterArrendada` tinyint(1) DEFAULT NULL,
  `CaracterPropietaria` tinyint(1) DEFAULT NULL,
  `CaracterAlbergue` tinyint(1) DEFAULT NULL,
  `AnimalesEnLaVivienda` text DEFAULT NULL,
  `AntecedentesLaborales` text DEFAULT NULL,
  `NucleoFamiliar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_Cita` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Medico` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Estado` enum('Programada','Confirmada','Cancelada','Completada') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosidentificacion`
--

CREATE TABLE `datosidentificacion` (
  `ID_DatosIdentificacion` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `FechaRealizacion` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(255) DEFAULT NULL,
  `EstadoCivil` varchar(50) DEFAULT NULL,
  `NumeroHijos` int(11) DEFAULT NULL,
  `Procedencia` varchar(100) DEFAULT NULL,
  `ResidenciasAnteriores` text DEFAULT NULL,
  `LugarOrigen` varchar(100) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Escolaridad` varchar(100) DEFAULT NULL,
  `Ocupacion` varchar(100) DEFAULT NULL,
  `GrupoSanguineo` varchar(5) DEFAULT NULL,
  `RH` varchar(5) DEFAULT NULL,
  `Acompanante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedadactual`
--

CREATE TABLE `enfermedadactual` (
  `ID_EnfermedadActual` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `DescripcionEnfermedad` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenfisico`
--

CREATE TABLE `examenfisico` (
  `ID_ExamenFisico` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ImpresionGeneral` text DEFAULT NULL,
  `SignosVitales_TA` varchar(20) DEFAULT NULL,
  `SignosVitales_Oxigeno` varchar(20) DEFAULT NULL,
  `SignosVitales_FC` int(11) DEFAULT NULL,
  `SignosVitales_FR` int(11) DEFAULT NULL,
  `SignosVitales_T` decimal(5,2) DEFAULT NULL,
  `SignosVitales_Peso` decimal(5,2) DEFAULT NULL,
  `SignosVitales_Talla` decimal(5,2) DEFAULT NULL,
  `SignosVitales_IMC` decimal(5,2) DEFAULT NULL,
  `PulsosDerecho` varchar(50) DEFAULT NULL,
  `PulsosIzquierdo` varchar(50) DEFAULT NULL,
  `PulsoRadial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenfisico_segmentario`
--

CREATE TABLE `examenfisico_segmentario` (
  `ID_ExamenFisico_Segmentario` int(11) NOT NULL,
  `ID_ExamenFisico` int(11) DEFAULT NULL,
  `PielAnexosFaneras` text DEFAULT NULL,
  `CueroCabello` text DEFAULT NULL,
  `Cabello` text DEFAULT NULL,
  `Frente` text DEFAULT NULL,
  `Cejas` text DEFAULT NULL,
  `Párpados` text DEFAULT NULL,
  `Ojos` text DEFAULT NULL,
  `OrejasOidos` text DEFAULT NULL,
  `Nariz` text DEFAULT NULL,
  `BocaOrofaringe` text DEFAULT NULL,
  `Cuello` text DEFAULT NULL,
  `Torax` text DEFAULT NULL,
  `Abdomen` text DEFAULT NULL,
  `Genitourinario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_citas`
--

CREATE TABLE `historial_citas` (
  `ID_Historial` int(11) NOT NULL,
  `ID_Cita` int(11) DEFAULT NULL,
  `Notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiondiagnostica`
--

CREATE TABLE `impresiondiagnostica` (
  `ID_Paciente` int(11) DEFAULT NULL,
  `DiagnosticoSindromatico` text DEFAULT NULL,
  `DiagnosticoPatologico` text DEFAULT NULL,
  `DiagnosticoTopografico` text DEFAULT NULL,
  `DiagnosticoEtiologico` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID_Medico` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `CedulaProfesional` varchar(20) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Especialidad`, `CedulaProfesional`, `Direccion`, `Telefono`) VALUES
(1, 'Victor', 'Cervantes', 'Gracia', 'Naturopatia', '32432', 'sdsadss', '3243244');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivoconsulta`
--

CREATE TABLE `motivoconsulta` (
  `ID_MotivoConsulta` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Motivo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `ID_Medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parescraneales`
--

CREATE TABLE `parescraneales` (
  `ID_ParesCraneales` int(11) NOT NULL,
  `ID_ExamenFisico` int(11) DEFAULT NULL,
  `NervioOlfatorio` text DEFAULT NULL,
  `NervioOptico` text DEFAULT NULL,
  `NerviosOculomotores` text DEFAULT NULL,
  `NervioTrigemino` text DEFAULT NULL,
  `NervioFacial` text DEFAULT NULL,
  `NervioVestibuloclear` text DEFAULT NULL,
  `NervioGlosofaringeo` text DEFAULT NULL,
  `NervioNeumogastrico` text DEFAULT NULL,
  `NervioAccesorio` text DEFAULT NULL,
  `NervioHioogloso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planmanejo`
--

CREATE TABLE `planmanejo` (
  `ID_Paciente` int(11) DEFAULT NULL,
  `Texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `ID_Receta` int(11) NOT NULL,
  `ID_Medico` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `NombrePaciente` varchar(100) DEFAULT NULL,
  `ApellidoPPaciente` varchar(100) DEFAULT NULL,
  `ApellidoMPaciente` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Peso` decimal(5,2) DEFAULT NULL,
  `Temperatura` decimal(4,2) DEFAULT NULL,
  `Talla` decimal(4,2) DEFAULT NULL,
  `TensionArterial` varchar(20) DEFAULT NULL,
  `SO2` decimal(4,2) DEFAULT NULL,
  `Dx` varchar(255) DEFAULT NULL,
  `Receta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumendatospositivos`
--

CREATE TABLE `resumendatospositivos` (
  `ID_Resumen` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Resumen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisionporsistemas`
--

CREATE TABLE `revisionporsistemas` (
  `ID_RevisionPorSistemas` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `SintomasGenerales` text DEFAULT NULL,
  `SintomasPielAnexos` text DEFAULT NULL,
  `SintomasOjosVision` text DEFAULT NULL,
  `SintomasNarizOlfato` text DEFAULT NULL,
  `SintomasOidosAudicion` text DEFAULT NULL,
  `SintomasBocaGusto` text DEFAULT NULL,
  `SintomasCuello` text DEFAULT NULL,
  `SintomasTorax` text DEFAULT NULL,
  `SintomasRespiratorios` text DEFAULT NULL,
  `SintomasCardiologicos` text DEFAULT NULL,
  `SintomasDigestivos` text DEFAULT NULL,
  `SintomasEndocrinos` text DEFAULT NULL,
  `SintomasExtremidades` text DEFAULT NULL,
  `SintomasNeurologicos` text DEFAULT NULL,
  `SintomasUrologicos` text DEFAULT NULL,
  `SintomasGenitales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensibilidad`
--

CREATE TABLE `sensibilidad` (
  `ID_Sensibilidad` int(11) NOT NULL,
  `ID_ExamenFisico` int(11) DEFAULT NULL,
  `SensibilidadSuperficial` text DEFAULT NULL,
  `SensibilidadProfunda` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemamusculoesqueletico`
--

CREATE TABLE `sistemamusculoesqueletico` (
  `ID_SistemaMusculoEsqueletico` int(11) NOT NULL,
  `ID_ExamenFisico` int(11) DEFAULT NULL,
  `Tono` text DEFAULT NULL,
  `Trofismo` text DEFAULT NULL,
  `Coordinacion` text DEFAULT NULL,
  `Marcha` text DEFAULT NULL,
  `MovimientosAnormales` text DEFAULT NULL,
  `Fuerza` text DEFAULT NULL,
  `MovilidadArticular` text DEFAULT NULL,
  `ReflejosTendinosos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemaneurologico`
--

CREATE TABLE `sistemaneurologico` (
  `ID_SistemaNeurologico` int(11) NOT NULL,
  `ID_ExamenFisico` int(11) DEFAULT NULL,
  `EstadoConciencia` text DEFAULT NULL,
  `EstadoMental_Memoria` text DEFAULT NULL,
  `EstadoMental_JuicioRaciocinioCalculo` text DEFAULT NULL,
  `EstadoMental_Lateralidad` text DEFAULT NULL,
  `EstadoMental_Lenguaje` text DEFAULT NULL,
  `EstadoMental_Gnosias` text DEFAULT NULL,
  `EstadoMental_Praxias` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Usuario` varchar(100) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `ID_Medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Usuario`, `CorreoElectronico`, `Contrasena`, `ID_Medico`) VALUES
(1, 'VicCG', 'victor@gmail.com', 'manman123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisiscaso`
--
ALTER TABLE `analisiscaso`
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `antecedenteshereditarios`
--
ALTER TABLE `antecedenteshereditarios`
  ADD PRIMARY KEY (`ID_AntecedentesHereditarios`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `antecedentespersonales`
--
ALTER TABLE `antecedentespersonales`
  ADD PRIMARY KEY (`ID_AntecedentesPersonales`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `antecedentespsicosociales`
--
ALTER TABLE `antecedentespsicosociales`
  ADD PRIMARY KEY (`ID_AntecedentesPsicosociales`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `ID_Paciente` (`ID_Paciente`),
  ADD KEY `ID_Medico` (`ID_Medico`);

--
-- Indices de la tabla `datosidentificacion`
--
ALTER TABLE `datosidentificacion`
  ADD PRIMARY KEY (`ID_DatosIdentificacion`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `enfermedadactual`
--
ALTER TABLE `enfermedadactual`
  ADD PRIMARY KEY (`ID_EnfermedadActual`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  ADD PRIMARY KEY (`ID_ExamenFisico`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `examenfisico_segmentario`
--
ALTER TABLE `examenfisico_segmentario`
  ADD PRIMARY KEY (`ID_ExamenFisico_Segmentario`),
  ADD KEY `ID_ExamenFisico` (`ID_ExamenFisico`);

--
-- Indices de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD PRIMARY KEY (`ID_Historial`),
  ADD KEY `ID_Cita` (`ID_Cita`);

--
-- Indices de la tabla `impresiondiagnostica`
--
ALTER TABLE `impresiondiagnostica`
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID_Medico`);

--
-- Indices de la tabla `motivoconsulta`
--
ALTER TABLE `motivoconsulta`
  ADD PRIMARY KEY (`ID_MotivoConsulta`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD KEY `ID_Medico` (`ID_Medico`);

--
-- Indices de la tabla `parescraneales`
--
ALTER TABLE `parescraneales`
  ADD PRIMARY KEY (`ID_ParesCraneales`),
  ADD KEY `ID_ExamenFisico` (`ID_ExamenFisico`);

--
-- Indices de la tabla `planmanejo`
--
ALTER TABLE `planmanejo`
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`ID_Receta`),
  ADD KEY `ID_Medico` (`ID_Medico`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `resumendatospositivos`
--
ALTER TABLE `resumendatospositivos`
  ADD PRIMARY KEY (`ID_Resumen`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `revisionporsistemas`
--
ALTER TABLE `revisionporsistemas`
  ADD PRIMARY KEY (`ID_RevisionPorSistemas`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `sensibilidad`
--
ALTER TABLE `sensibilidad`
  ADD PRIMARY KEY (`ID_Sensibilidad`),
  ADD KEY `ID_ExamenFisico` (`ID_ExamenFisico`);

--
-- Indices de la tabla `sistemamusculoesqueletico`
--
ALTER TABLE `sistemamusculoesqueletico`
  ADD PRIMARY KEY (`ID_SistemaMusculoEsqueletico`),
  ADD KEY `ID_ExamenFisico` (`ID_ExamenFisico`);

--
-- Indices de la tabla `sistemaneurologico`
--
ALTER TABLE `sistemaneurologico`
  ADD PRIMARY KEY (`ID_SistemaNeurologico`),
  ADD KEY `ID_ExamenFisico` (`ID_ExamenFisico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD KEY `ID_Medico` (`ID_Medico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedenteshereditarios`
--
ALTER TABLE `antecedenteshereditarios`
  MODIFY `ID_AntecedentesHereditarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antecedentespersonales`
--
ALTER TABLE `antecedentespersonales`
  MODIFY `ID_AntecedentesPersonales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antecedentespsicosociales`
--
ALTER TABLE `antecedentespsicosociales`
  MODIFY `ID_AntecedentesPsicosociales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datosidentificacion`
--
ALTER TABLE `datosidentificacion`
  MODIFY `ID_DatosIdentificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermedadactual`
--
ALTER TABLE `enfermedadactual`
  MODIFY `ID_EnfermedadActual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  MODIFY `ID_ExamenFisico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenfisico_segmentario`
--
ALTER TABLE `examenfisico_segmentario`
  MODIFY `ID_ExamenFisico_Segmentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  MODIFY `ID_Historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID_Medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `motivoconsulta`
--
ALTER TABLE `motivoconsulta`
  MODIFY `ID_MotivoConsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parescraneales`
--
ALTER TABLE `parescraneales`
  MODIFY `ID_ParesCraneales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `ID_Receta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resumendatospositivos`
--
ALTER TABLE `resumendatospositivos`
  MODIFY `ID_Resumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revisionporsistemas`
--
ALTER TABLE `revisionporsistemas`
  MODIFY `ID_RevisionPorSistemas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sensibilidad`
--
ALTER TABLE `sensibilidad`
  MODIFY `ID_Sensibilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sistemamusculoesqueletico`
--
ALTER TABLE `sistemamusculoesqueletico`
  MODIFY `ID_SistemaMusculoEsqueletico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sistemaneurologico`
--
ALTER TABLE `sistemaneurologico`
  MODIFY `ID_SistemaNeurologico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisiscaso`
--
ALTER TABLE `analisiscaso`
  ADD CONSTRAINT `analisiscaso_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antecedenteshereditarios`
--
ALTER TABLE `antecedenteshereditarios`
  ADD CONSTRAINT `antecedenteshereditarios_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antecedentespersonales`
--
ALTER TABLE `antecedentespersonales`
  ADD CONSTRAINT `antecedentespersonales_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antecedentespsicosociales`
--
ALTER TABLE `antecedentespsicosociales`
  ADD CONSTRAINT `antecedentespsicosociales_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datosidentificacion`
--
ALTER TABLE `datosidentificacion`
  ADD CONSTRAINT `datosidentificacion_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfermedadactual`
--
ALTER TABLE `enfermedadactual`
  ADD CONSTRAINT `enfermedadactual_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  ADD CONSTRAINT `examenfisico_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenfisico_segmentario`
--
ALTER TABLE `examenfisico_segmentario`
  ADD CONSTRAINT `examenfisico_segmentario_ibfk_1` FOREIGN KEY (`ID_ExamenFisico`) REFERENCES `examenfisico` (`ID_ExamenFisico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD CONSTRAINT `historial_citas_ibfk_1` FOREIGN KEY (`ID_Cita`) REFERENCES `citas` (`ID_Cita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `impresiondiagnostica`
--
ALTER TABLE `impresiondiagnostica`
  ADD CONSTRAINT `impresiondiagnostica_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `motivoconsulta`
--
ALTER TABLE `motivoconsulta`
  ADD CONSTRAINT `motivoconsulta_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parescraneales`
--
ALTER TABLE `parescraneales`
  ADD CONSTRAINT `parescraneales_ibfk_1` FOREIGN KEY (`ID_ExamenFisico`) REFERENCES `examenfisico` (`ID_ExamenFisico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planmanejo`
--
ALTER TABLE `planmanejo`
  ADD CONSTRAINT `planmanejo_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`),
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `resumendatospositivos`
--
ALTER TABLE `resumendatospositivos`
  ADD CONSTRAINT `resumendatospositivos_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revisionporsistemas`
--
ALTER TABLE `revisionporsistemas`
  ADD CONSTRAINT `revisionporsistemas_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sensibilidad`
--
ALTER TABLE `sensibilidad`
  ADD CONSTRAINT `sensibilidad_ibfk_1` FOREIGN KEY (`ID_ExamenFisico`) REFERENCES `examenfisico` (`ID_ExamenFisico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistemamusculoesqueletico`
--
ALTER TABLE `sistemamusculoesqueletico`
  ADD CONSTRAINT `sistemamusculoesqueletico_ibfk_1` FOREIGN KEY (`ID_ExamenFisico`) REFERENCES `examenfisico` (`ID_ExamenFisico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistemaneurologico`
--
ALTER TABLE `sistemaneurologico`
  ADD CONSTRAINT `sistemaneurologico_ibfk_1` FOREIGN KEY (`ID_ExamenFisico`) REFERENCES `examenfisico` (`ID_ExamenFisico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
