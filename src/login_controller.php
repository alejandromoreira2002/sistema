<?php
    include_once('./model/user_model.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user_model = new User();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $user_model->consultarUsuario($username, $password);

        if(!$user){
            echo 0;
        }else{
            $id_user = $user[0]['id_user'];
            $username = $user[0]['username'];
            $email = $user[0]['email'];
            $hashedPassword = $user[0]['password'];
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['id_user'] = $id_user;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                echo 1;
            }else{
                echo 0;
            }
        }
    }else{
        header('Location: ../index.php');
    }
?>