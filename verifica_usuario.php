<?php
session_start();

//include('connect.php');
require('connect.php');
 
 $usuario = $_POST['usuario'];
 $senha = $_POST['senha'];

 $sql = "SELECT username,password FROM users WHERE username = '$usuario'";
 $busca = mysqli_query($conexao, $sql);

//tratar a senha limpa e o seu hash
 $dados = mysqli_fetch_array($busca);
 //$userRecebido = $dados['usuario'];
 $senhabd = $dados['password'];
 $senhaVerificada=$senha;

 //$senhaVerificada = md5($senha);


 //verifica usuario

 $linha = mysqli_affected_rows($conexao);

 //verifica a senha
 if ($linha == 1) { //existe usuario entao vai comparar a senha
   
    if ($senhabd == $senhaVerificada){
       
         $_SESSION['usuario'] = $usuario;
         header ('Location: index.php');

    } else {
       
        header('Location:login_pabx2.php?status=senhaInvalida');
    }

 } else {
     //echo 'Usuario inexistente';
    header ('Location:login_pabx2.php?status=usuarioInvalido');

 }

