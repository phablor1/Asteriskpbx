<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//$objUsuarios = Usuario::retornaUsuarios();
//$objUsuarios = new Usuario();
//echo "<pre>";print_r($objUsuarios);echo "</pre>";exit;
//var_dump($objUsuarios);

//Obriga usuario esteja logado

//Login::requireLogin();


include __DIR__.'/includes/top.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
