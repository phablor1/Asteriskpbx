<?php

  include 'connect.php';

  
  $contexto_discagem = mysqli_escape_string($conexao, $_POST['contexto_discagem']);
  $discagem = mysqli_escape_string($conexao, $_POST['discagem']);
  $destino = mysqli_escape_string($conexao, $_POST['destino']);
  
  
  $traco = '_'; // concatena para colocar sempre na frente da regra ramal ou externa com ou sem coringa
  $sip = 'SIP/'; //tecnologia 
  $ring_time = ',120'; // chama por 120 segundos 
  $total = $sip.$destino.$ring_time; // concatena 
  $total_1 = $traco.$discagem; //concatena

  $sql = "INSERT INTO extensions  (context,exten,priority,app,appdata,tipo_discagem) VALUES
         ('$contexto_discagem','$total_1','1','Dial','$total','ramal')";
  $result = mysqli_query($conexao,$sql); 


  if ($result==true){
    
    header('Location:comum.php?discagem=ok&regra='.$discagem);
    
  }else{
    header('Location:comum.php?discagem=fail&regra='.$discagem);

  }



?>

