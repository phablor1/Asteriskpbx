<?php 

  include 'connect.php';
  
   echo $id = mysqli_escape_string($conexao, $_GET['id_discagem']);
   echo $exten = mysqli_escape_string($conexao, $_GET['exten']);
 
   
    $sql = "DELETE  FROM extensions WHERE id = '$id';";
    $result = mysqli_query($conexao,$sql); 
    //var_dump($result) ; // vai retornar um boleano true
    
    if ($result==true){
  
      header ('location:comum.php?delete_trunk=ok&exten_ip_trunk='.$exten);
      
    }else{
	header ('location:comum.php?delete_trunk=fail&exten_ip_trunk='.$exten);

    }


?>








