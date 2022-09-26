<?php
#Creo la sesion
//

require("modelo/db.php");
class Login
{
    #Creo una variable privada donde ira Conexion
    private $_db;

    #Creo el constructor
    public function __construct()
    {
        #Intancio a Conexion
        $this->_db = new Conexion();
    }

    #Creo el meto de login
    public function login($user, $passw)
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {
            #Prepara la SQL
            $sql_login = "SELECT * FROM USUARIOS WHERE nombre = '$user' AND passwd ='$passw'";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_login);
            #Ejecuta la setencia
            $result->execute();

            #Guardo el resultado
            $r = $result->fetch(PDO::FETCH_OBJ);

            #Validar resultado si hay algun resultado TRUE
            if ($r) {
                #Creo la variable de sesion 
                $_SESSION['id'] = $r->id;
                $_SESSION['user'] = $r->nombre;
                $_SESSION['role'] = $r->role;
                return true;
            } else {

                return false;
            }
        } catch (Exception $e) {
            die('Error en la funcion login') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }
}
