<?php 

  include 'connect.php';
  
  $ramal = mysqli_escape_string($conexao, $_GET['ramal']);
 
   
    $sql = "DELETE  FROM sippeers WHERE name = '$ramal';";
    $result = mysqli_query($conexao,$sql); 
    var_dump($result) ; // vai retornar um boleano true
    
    if ($result==true){
      header ('location:comum.php?deletado=ok&numero='.$ramal);
      
    }else{
      echo 'dados nao atualizados';

    }


?>








