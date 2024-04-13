<?php

function cargarControlador($controlador) {
    $nombreControlador = ucwords($controlador)."Controller";
    $archivoControlador = 'controllers/'.$controlador.'.php';

    if (!is_file($archivoControlador)) {
        $archivoControlador = 'controllers/'.CONTROLADOR_PRINCIPAL.'.php';
    }

    require_once $archivoControlador;

    // Verificar si el controlador es el controlador de Login
    if ($controlador === 'Login') {
        // Obtener la conexión a la base de datos
        $db = Conectar::conexion();
        // Instanciar el controlador pasando la conexión como argumento
        $control = new $nombreControlador($db);
    } else {
        // Instanciar el controlador sin pasar la conexión
        $control = new $nombreControlador();
    }

    return $control;
}

function cargarAccion($controller, $accion) {
    if (isset($accion) && method_exists($controller, $accion)) {
        $controller->$accion();
    } else {
        $controller->ACCION_PRINCIPAL();
    }
}

?>