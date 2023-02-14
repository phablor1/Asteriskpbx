<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//Obriga usuario a não esta logado
//Login::requireLogout();

//Validação do post
if (isset($_POST['usuario']) && isset($_POST['senha'])){
    //die('Logar');
    //header('location:index.php');
    //exit;
    echo 'estamos aqui!!!';
    $user = $_POST['usuario'];
    //echo ''.$_POST['senha'];
    $objUser = Usuario::getUsuario($user);
    echo "<pre>";print_r($objUser);echo "</pre>";exit;
    //$objUser = new Usuario;
    //$objUser->username = $_POST['username'];
    //$objUser->password = $_POST['password'];
}


include __DIR__.'/includes/top-login.php';
include __DIR__ .'/includes/login-usuario.php';
include __DIR__.'/includes/footer.php';
?>