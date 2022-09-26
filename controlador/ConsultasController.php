<?php
require("modelo/consultas.php");

class ConsultasController
{

    public static function incidenciasPendientes()
    {
        #Creo el objeto Consultas de modelo
        $_modelo2 = new Consultas();

        #Llamo a la funcion tareasPendientes
        $_result = $_modelo2->tareasPendientes();
        #Paso el resultado a tabla para que lo 
        #pueda representar
        require("vista/user/tabla.php");
    }

    public static function incidenciasHistorial()
    {
        #Creo el objeto Consultas de modelo
        $_modelo2 = new Consultas();

        #Llamo a la funcion tareasPendientes
        $_result2 = $_modelo2->tareasHistorial();
        #Paso el resultado a tabla para que lo 
        #pueda representar
        require("vista/user/historial.php");
    }


    public static function tablas()
    {
        #llamo a welcome donde esta el cuerpo de esta vista 
        require("vista/user/welcome.php");
        #Llamo a las tablas
        ConsultasController::incidenciasPendientes();
        ConsultasController::incidenciasHistorial();
    }

    public static function insertarIncidencias()
    {
       
        if (isset($_POST['insertar'])) {
            $_material = trim($_POST['material']);
            $_texto = trim($_POST['texto']);
            $_aula = trim($_POST['aula']);
            $_prioridad = trim($_POST['prioridad']);
            $_envioemail = trim($_POST['envioemail']);

            #Creo el objeto Consultas de modelo
            $_modelo2 = new Consultas();

            #Le paso lo parametros que necesita la funcion 
            #para realizar la consulta
            $_result = $_modelo2->insertarTareas($_material, $_texto, $_aula, $_prioridad, $_envioemail);
        }
    }

    public static function incidenciasPendientesAdmin()
    {
        #Creo el objeto Consultas de modelo
        $_modelo2 = new Consultas();

        #Llamo a la funcion tareasPendientes
        $_result = $_modelo2->tareasPendientesAdmin();
        #Paso el resultado a tabla para que lo 
        #pueda representar
        require("vista/admin/tabla.php");
    }
    public static function incidenciasHistorialAdmin()
    {
        #Creo el objeto Consultas de modelo
        $_modelo2 = new Consultas();

        #Llamo a la funcion tareasPendientes
        $_result2 = $_modelo2->tareasHistorialAdmin();
        #Paso el resultado a tabla para que lo 
        #pueda representar
        require("vista/admin/historial.php");
    }

    public static function tablasAdmin()
    {
        #llamo a welcome donde esta el cuerpo de esta vista 
        require("vista/admin/welcome.php");
        #Llamo a las tablas
        ConsultasController::incidenciasPendientesAdmin();
        ConsultasController::incidenciasHistorialAdmin();
    }


    #Creo la funcion actualizar
    public static function actualizar()
    {
        #Creo el objeto Login de modelo
        $_modelo = new Consultas();

        #Creo la variable POST 
        if (isset($_POST['enviar'])) {
            $_user = trim($_POST['user']);
            $_envioemail = trim($_POST['envioemail']);
            $_realizado = trim($_POST['realizado']);
            #Le paso lo parametros que necesita la funcion 
            #para realizar la consulta
            $_modelo->actualizar($_user, $_envioemail, $_realizado);
        }
       

    }
}
