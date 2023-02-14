<?php 
include 'connect.php';

$user = mysqli_escape_string($conexao,$_GET['user']);
$senha = mysqli_escape_string($conexao,$_GET['senha']);
$nome = mysqli_escape_string($conexao,$_GET['nome']);
$email = mysqli_escape_string($conexao,$_GET['email']);

$query = "UPDATE usuario SET senha_usuario='$senha',nome='$nome',email='$email' WHERE usuario= '$user';";
$result = mysqli_query($conexao,$query);
//var_dump($result);
//echo '<br>';

if ($result==true){
    header('location:validacoes.php?update=ok&user='.$user);
}else{
    echo 'dados não atualizados!!!';
}
?>