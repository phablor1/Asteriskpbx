<?php
require __DIR__ .'/vendor/autoload.php';

use \App\Entity\Usuario;

use \App\Session\Login;

//Obriga usuario esteja logado
//Login::requireLogin();

$obUsuario = new Usuario;

//Validação do post
if(isset($_POST['usuario'])&& isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['email'])){
    //die('Cadastrar');
    //$obUsuario = new Usuario;
    $obUsuario->username = $_POST['usuario'];
    $obUsuario->password = $_POST['senha'];
    $obUsuario->name = $_POST['nome'];
    $obUsuario->email = $_POST['email'];
    $obUsuario->cadastrar();
    //echo "<pre>";print_r($obUsuario);echo "</pre>";exit;
    header('location:index.php?status=success');
    exit;
}

include __DIR__.'/includes/top.php';
include __DIR__ .'/includes/formularios.php';
include __DIR__.'/includes/footer.php';
