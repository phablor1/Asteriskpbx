<?php

use App\Controller\UsuarioController;

// Para saber mais sobre a função parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
switch ($url) 
{
    case '/app':
        echo "página inicial";
        break;

    case '/app/usuario':
        // Para saber mais sobre o Operador de Resolução de Escopo (::), 
        // leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
        UsuarioController::index();
        break;

    case '/usuario/form':
        UsuarioController::form();
        break;

    case '/usuario/form/save':
        UsuarioController::save();
        break;

    case '/usuario/delete':
        UsuarioController::delete();
        break;

    default:
        echo "Erro 404";
        break;
}