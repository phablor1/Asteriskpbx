<?php 

include 'connect.php';

       $destino_exten = mysqli_escape_string($conexao, $_GET['destino_exten']);
       $id_discagem =mysqli_escape_string($conexao, $_GET['id_discagem']);
       $exten = mysqli_escape_string($conexao, $_GET['exten']);
       $contexto_discagem = mysqli_escape_string($conexao, $_GET['contexto_discagem']);
       $excluir_digitos = mysqli_escape_string($conexao, $_GET['excluir_digitos']);
       $inserir_digitos = mysqli_escape_string($conexao, $_GET['inserir_digitos']);
    
      //  SIP/961${EXTEN:5}@172.22.58.44,120   
    
      $exten = '_'.$exten; // coloca o '_'no exten antes de escrever no banco para não dar erro em discagens iniciadas com 0
      // $destino_exten = 'SIP/'.$destino_exten.',120'; // colocao SIP/ e o ,120 antes de atualizar o appdata
      $destino_exten = 'SIP/'.$inserir_digitos.'${EXTEN:'.$excluir_digitos.'}@'.$destino_exten.',120'; // colocao SIP/ e o ,120 antes de atualizar o appdata
    
      $sql = "UPDATE extensions SET  context='$contexto_discagem' , exten='$exten', appdata='$destino_exten' WHERE id = '$id_discagem';";
      $result = mysqli_query($conexao,$sql);
      //var_dump($result) ; // vai retornar um boleano true
    
      echo '<br>'; 
    
      if ($result==TRUE){
          $exten=substr($exten,1); //retira o '_' para apresentar pois to da discagem começa com '_'
          header ('location:comum.php?update_trunk=ok&numero='.$exten);
    
      }else{
        $exten=substr($exten,1); //retira o '_' para apresentar pois to da discagem começa com '_'
        header ('location:comum.php?update_trunk=fail&numero='.$exten);
  
        
      }




?>