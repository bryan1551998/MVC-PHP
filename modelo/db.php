<?php
//Creo la conexión a la BASE DE DATOS

//Creo una clase BASE DE DATOS
class Conexion
{
    public function connect()
    {
        #Conexion a la BBDD
        #Datos de la conexión de la bbdd
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "incidencias_bp";

        try {
            #Conexion a la bbdd 
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
            #set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           
            #Retorna una retunr con la conexion a la DB
            return $conn;
           
        } catch (PDOException $e) {
            #Salta exepcion
            echo "Connection falied: " . $e->getMessage();
        }
    }
}
