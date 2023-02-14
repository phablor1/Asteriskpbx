<?php 

include 'connect.php';



$id_discagem =mysqli_escape_string($conexao, $_GET['id_discagem']);
$exten = mysqli_escape_string($conexao, $_GET['exten']);
$contexto_discagem = mysqli_escape_string($conexao, $_GET['contexto_discagem']);
$destino_exten = mysqli_escape_string($conexao, $_GET['destino_exten']);

$exten = '_'.$exten; // coloca o '_'no exten antes de escrever no banco para não dar erro em discagens iniciadas com 0
$destino_exten = 'SIP/'.$destino_exten.',120'; // colocao SIP/ e o ,120 antes de atualizar o appdata

$sql = "UPDATE extensions SET  context='$contexto_discagem' , exten='$exten', appdata='$destino_exten' WHERE id = '$id_discagem';";
$result = mysqli_query($conexao,$sql);
//var_dump($result) ; // vai retornar um boleano true

echo '<br>'; 

if ($result==TRUE){
    
    header ('location:comum.php?discagem_update=ok&regra='.$exten);
    
}else{
    
    header ('location:comum.php?discagem_update=fail&regra='.$exten);
   
}



?>