<?php 
    session_start();
    
    if(isset($_SESSION['id_user']) && isset($_SESSION['username']) && isset($_SESSION['email'])){
        header('Location: public/principal.html');
    }else{
        header('Location: public/register.html');
    }
?>