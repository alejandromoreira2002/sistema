<?php
    include_once(dirname(__DIR__,1).'\db\db.php');
    class User
    {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function registrarUsuario($username, $email, $password){
            $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$hashed_pass');";
            $this->db->registrarDatos($sql);
        }

        public function consultarUsuario($username, $password){
            $sql = "SELECT * FROM usuarios WHERE username = '$username' LIMIT 1;";
            $usuario = $this->db->getDatos($sql);

            if(!$usuario){
                return false;
            }else{
                return $usuario;
            }
        }
    }
?>