<?php
session_start();
require("config.php");
$page = "index";

#Verifico si existe 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
#Con un switch clasifico a que pagina va 
#si no hay nada por defecto ira a LOGIN
switch ($page) {

        #Si el valor de PAGE  es login
        #trae la funcion index de loginController
    case 'login':
        require("controlador/LoginController.php");
        LoginController::index();
        break;

        #Si el valor de PAGE  es loginauth
        #trae la funcion login de loginController
    case 'loginauth':
        require("controlador/LoginController.php");
        LoginController::login();
        break;

        #Si el valor de PAGE  es admin
        #trae la funcion actualizar y incidenciasPendientesAdmin
    case 'admin':
        require("controlador/ConsultasController.php");
        ConsultasController::actualizar();
        ConsultasController::tablasAdmin();
        break;

        #Si el valor de PAGE  es admin
        #trae la funcion insertarIncidencias y tablas()
    case 'user':
        require("controlador/ConsultasController.php");
        ConsultasController::insertarIncidencias();
        ConsultasController::tablas();
        break;

        #Si el valor de PAGE  es logout
        #trae la funcion logout de loginController
    case 'logout':
        require("controlador/LoginController.php");
        LoginController::logout();
        break;



    default:

        // echo "<a href='" . urlsite . "?page=login'>LOGIN</a>";
        header('location:' . urlsite . '?page=login');
        break;
}
