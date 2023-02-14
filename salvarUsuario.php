<?php 
include 'connect.php';

$nome = $_POST['nome'];
$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "INSERT INTO users (username,password,name,email)
 VALUES ('$user',MD5('$senha'),'$nome','$email')";
//var_dump( $result = mysqli_query($conexao,$sql));
$result = mysqli_query($conexao,$sql);
if($result == true){
    //echo "Usuario criado com sucesso";
    header('Location:validacoes.php?cadastro=ok&user='.$user);
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location:validacoes.php?cadastro=fail&user='.$user);
}
?>