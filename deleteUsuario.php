<?php 
include 'connect.php';
$user = mysqli_escape_string($conexao,$_GET['user']);

$sql = "DELETE FROM usuario WHERE usuario = '$user';";

$result = mysqli_query($conexao,$sql);
//var_dump($conexao,$sql);
if ($result == true){
    header('location:validacoes.php?deletado=ok&user='.$user);

}else{
    echo 'dados não excluido !!!';
}
?>