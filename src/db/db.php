<?php 
class Database
{
    private $user;
    private $password;
    private $server;
    private $database;

    public function __construct(){
        $this->user = "root";
        $this->password = "";
        $this->server = "localhost";
        $this->database = "sistemadb";
    }

    public function conexion(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->database);
        if(!$conn){
            echo mysqli_error($conn);
            return false;
        }else{
            return $conn;
        }
    }

    public function registrarDatos($sql){
        $conn = $this->conexion();
        
        if(!$conn) echo "No se pudo conectar a la BD";
        
        if(mysqli_query($conn, $sql)){
            echo "Datos registrados correctamente";
        }else{
            echo "Hubo un problema al subir los datos";
        }
        mysqli_close($conn);
    }

    public function getDatos($sql){
        $conn = $this->conexion();
        $resultado = mysqli_query($conn, $sql);
        if(!$resultado)
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            return false;
        }
        $datos = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos[] = $row;
        }
        mysqli_close($conn);
        return $datos;
    }
}
?>