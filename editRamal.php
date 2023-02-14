<?php 

include 'connect.php';


$ramal = mysqli_escape_string($conexao, $_GET['rama_sip']);
$senha = mysqli_escape_string($conexao, $_GET['senha_ramal_sip']);
$contexto = mysqli_escape_string($conexao, $_GET['contexto_ramal_sip']);
  
$sql = "UPDATE sippeers SET  secret='$senha' , context='$contexto' WHERE name = '$ramal';";
$result = mysqli_query($conexao,$sql);
//var_dump($result) ; // vai retornar um boleano true

echo '<br>'; 

if ($result==TRUE){
    
    header ('location:comum.php?update=ok&numero='.$ramal);

}else{

    echo 'dados nao atualizados';
}



?>