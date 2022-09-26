<?php

#Llamo al modelo de login
require("modelo/login.php");

#Creo una clase
class LoginController
{
    #Creo la funcion index
    public static function index()
    {
        #Compruebo si la variable sesion login existe
        if (isset($_SESSION['user'])) {

            #Redirige a localhost/index
            header('location' . urlsite);
        }
        #Y llama a la vista login
        require("vista/front/formLogin.php");
    }
    #Creo la funcion login
    public static function login()
    {
        #Creo el objeto Login de modelo
        $_modelo = new Login();

        #Creo la variable POST 
        $_user = trim($_POST['user']);
        $_passw = trim($_POST['psswd']);

        #Llamo a la funcion login y le paso los parametros
        $_result = $_modelo->login($_user, $_passw);

        #Compruebo el resultado
        if ($_result) {

            if ($_SESSION['role'] == 'role_admin') {
                #Redirigo a index pero ahora con una sesion
                header('location:' . urlsite . '?page=admin');
            } else {
                #Redirigo a index pero ahora con una sesion
                header('location:' . urlsite . '?page=user');
            }
        } else {
            #Redirigo a index pero sin sesion
            header('location:' . urlsite . "?msg=Las credenciales no son correctas");
        }
    }
    public static function logout()
    {
        #Si no existe la sesion 
        if (!isset($_SESSION['user'])) {
            #Rediregir a la raiz para logueaarse
            header('location:' . urlsite);
        }

        #Elimino la variable de sison
        unset($_SESSION['user']);
        #Destruyo la sesion
        session_destroy();
        #Redirigir 
        header('location:' . urlsite);
    }
}
