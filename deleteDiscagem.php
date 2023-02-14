<?php 

  include 'connect.php';
  
   $id = mysqli_escape_string($conexao, $_GET['id_discagem']);
   $exten = mysqli_escape_string($conexao, $_GET['exten']);
 
   
    $sql = "DELETE  FROM extensions WHERE id = '$id';";
    $result = mysqli_query($conexao,$sql); 
    var_dump($result) ; // vai retornar um boleano true
    
    if ($result==true){
      header ('location:comum.php?exten_del=ok&exten='.$exten);
      
    }else{
      header ('location:comum.php?exten_del=fail&exten='.$exten);

    }


?>








