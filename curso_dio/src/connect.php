<?php

abstract class Connect{
    protected function conexao(){
        try{
        $ob_mysqli = new mysqli('localhost','root','p123456','dio');
            return $ob_mysqli;
    }catch(Exception $erro){
            return $erro->getMessage();
    }
if($ob_mysqli->connect_errno){
    echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
}
}
}
 /*
 $pdo = null;

    try{
        $pdo = new PDO('mysql:host:localhost:dbname=dio','root','p123456');
    }catch(Exception $erro){
        echo 'Erro ao conectar com o MySQL:'.$erro->getMessage();
        die();
    }*/
    return $ob_mysqli;

//var_dump($pdo);