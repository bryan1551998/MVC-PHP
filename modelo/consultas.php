<?php
require("modelo/db.php");

class Consultas
{
    #Creo una variable privada donde ira Conexion
    private $_db;

    #Creo el constructor
    public function __construct()
    {
        #Intancio a Conexion
        $this->_db = new Conexion();
    }

    public function tareasPendientes()
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {
            $id = $_SESSION['id'];
            #Prepara la SQL
            $sql_consulta = "SELECT fecha_inicio,comentario,material,aula,grupo,prioridad FROM incidencias WHERE id_usuario =$id AND comentario_admin IS  NULL ";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_consulta);
            #Ejecuta la setencia
            $result->execute();
            #Enviar resultado
            return  $result->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Error en la funcion tareas pendientes') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }

    public function tareasHistorial()
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {
            $id = $_SESSION['id'];
            #Prepara la SQL
            $sql_consulta = "SELECT fecha_inicio,fecha_final,comentario,comentario_admin, aula,material,prioridad FROM incidencias
            WHERE id_usuario =$id AND comentario_admin IS NOT NULL ";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result2 =  $this->_db->connect()->prepare($sql_consulta);
            #Ejecuta la setencia
            $result2->execute();
            #Enviar resultado
            return  $result2->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Error en la funcion tareas pendientes') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }

    public function insertarTareas($material, $texto, $aula, $prioridad, $envioemail)
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {
            #Crear fecha actual
            $fecha = date('Y-m-d H:i:s');

            $id = $_SESSION['id'];

            #Prepara la SQL
            $sql_consulta2 = "INSERT INTO `incidencias_bp`.`incidencias` (`id_usuario`, `fecha_inicio`, `fecha_final`, `material`, `comentario`, `aula`, `prioridad`, `grupo`) VALUES ('$id', '$fecha', '$fecha', '$material', '$texto', '$aula', '$prioridad', '$envioemail')";

            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_consulta2);
            #Ejecuta la setencia
            $result->execute();
        } catch (Exception $e) {
            die('Error en la funcion insertar') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }

    public function tareasPendientesAdmin()
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {


            #Prepara la SQL
            $sql_consulta = "SELECT i.id,i.fecha_inicio,i.comentario,u.nombre,i.aula,i.material,i.prioridad FROM incidencias i
            INNER JOIN usuarios u
            ON u.id = i.id_usuario WHERE i.comentario_admin IS NULL  ORDER BY i.fecha_inicio ";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_consulta);
            #Ejecuta la setencia
            $result->execute();
            #Enviar resultado
            return  $result->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Error en la funcion tareas pendientes admin') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }
    public function tareasHistorialAdmin()
    {
        #Llamo a la funcion conectar
        $this->_db->connect();

        try {


            #Prepara la SQL
            $sql_consulta = "SELECT i.id,i.fecha_inicio,i.fecha_final,u.nombre,i.comentario,i.comentario_admin,i.aula,i.material,i.prioridad FROM incidencias i
            INNER JOIN usuarios u
            ON u.id = i.id_usuario WHERE i.comentario_admin IS NOT NULL  ORDER BY i.fecha_inicio ";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_consulta);
            #Ejecuta la setencia
            $result->execute();
            #Enviar resultado
            return  $result->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Error en la funcion tareas pendientes admin') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }
    public function actualizar($_user, $_envioemail, $_realizado)
    {

        $fecha = date('Y-m-d H:i:s');


        #Llamo a la funcion conectar
        $this->_db->connect();

        try {

            #Prepara la SQL
            $sql_consulta = "UPDATE incidencias_bp.incidencias SET fecha_final='$fecha', comentario_admin='$_realizado' WHERE  id=$_user";
            #Llamo a la funcion connect de la clase Conexion que
            #devuelve la conexion y prepara la sentencia
            $result =  $this->_db->connect()->prepare($sql_consulta);
            #Ejecuta la setencia
            $result->execute();
            #Enviar resultado
            return  $result->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Error en la funcion tareas pendientes admin actualizar') . $e;
        } finally {
            #Corto la conexion
            $result = null;
        }
    }
}
