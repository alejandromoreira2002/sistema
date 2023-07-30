<?php
    include_once('./model/user_model.php');
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $user_model = new User();

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $user_model->registrarUsuario($username, $email, $password);
        header('Location: ../public/login.html');
    }else{
        header('Location: ../index.php');
    }
?>