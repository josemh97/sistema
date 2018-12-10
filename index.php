<?php 

    if(!isset($_SESSION)){
        session_start();
    }

    require_once "model/conexion.php";
    
    if(!isset($_GET["c"])){
        require_once "controller/Inicio.Controlador.php";
        $controlador = new InicioControlador();
        call_user_func(array($controlador, "Inicio"));
    } else {
        $controlador = $_GET['c'];
        require_once "controller/$controlador.Controlador.php";
        $controlador = ucwords($controlador)."Controlador";
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
        call_user_func(array($controlador, $accion));
    }
?>