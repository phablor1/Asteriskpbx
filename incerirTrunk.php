<?php

  include 'connect.php';
  
  
////////--------------função valida ip address------------//////
$ip_peer_discagem = mysqli_escape_string($conexao, $_GET['ip_peer_discagem']);

if (filter_var($ip_peer_discagem, FILTER_VALIDATE_IP)) {
//    echo("$ip_peer_discagem is a valid IP address");


$excluir_digitos=NULL; // SETA EM NULO O NUMERO DE DIGITOS A SER EXCLUIDO ANTES DE RODAR O SCRIPT
$inserir_digitos=NULL;  // SETA EM NULO O NUMERO DE DIGITOS A SER EXCLUIDO ANTES DE RODAR O SCRIPT
  
  $discagem_peer = mysqli_escape_string($conexao, $_GET['discagem_peer']);
  //$ip_peer_discagem = mysqli_escape_string($conexao, $_GET['ip_peer_discagem']);
  $contexto_sip_peer = mysqli_escape_string($conexao, $_GET['contexto_sip_peer']);
  $static_peer = mysqli_escape_string($conexao, $_GET['static_peer']);
  $excluir_digitos = mysqli_escape_string($conexao, $_GET['excluir_digitos']);
  $inserir_digitos = mysqli_escape_string($conexao, $_GET['inserir_digitos']);
  
  if (($excluir_digitos <> NULL) or ($inserir_digitos<>NULL)){
    $ip_peer_discagem = 'SIP/'.$inserir_digitos.'${EXTEN:'.$excluir_digitos.'}@'.$ip_peer_discagem.',120' ; //conta a string do asterisk com a variavel discada
    
  } else{
    $ip_peer_discagem = 'SIP/${EXTEN}@'.$ip_peer_discagem.',120' ; //conta a string do asterisk com a variavel discada
    
  }
  
  $discagem_peer = '_'.$discagem_peer; // incere o traço e o digito  a mais na regra de discagem para chamadas externas com coringa e '0' pra pegar linha 
  
  $sql = "INSERT INTO extensions  (context,exten,priority,app,appdata,tipo_discagem)
  VALUES ('$contexto_sip_peer','$discagem_peer','1','Dial','$ip_peer_discagem','trunk')"; //trunk é o flag para selecionar só discagem para trunk
 
 $result = mysqli_query($conexao,$sql); 
 
 if ($result==true){
   
   $discagem_peer = str_split($discagem_peer); // recebe o valor de exten e o divide em um array
   unset($discagem_peer[0]);  // exclui a posição zero que o '_' que vem do script para cadastrrar no banco como _xxxx 
   $discagem_peer=implode($discagem_peer); // junta os valores do array em uma string novamete
   header('Location:comum.php?sip_trunk=ok&discagem_out='.$discagem_peer);
   
  }else{
    
     header('Location:comum.php?sip_trunk=fail&discagem_out='.$discagem_peer);
    
  }
  } else {
   
    $discagem_peer = mysqli_escape_string($conexao, $_GET['discagem_peer']);
    $ip_peer_discagem = mysqli_escape_string($conexao, $_GET['ip_peer_discagem']);
    $contexto_sip_peer = mysqli_escape_string($conexao, $_GET['contexto_sip_peer']);
    $static_peer = mysqli_escape_string($conexao, $_GET['static_peer']);
    $excluir_digitos = mysqli_escape_string($conexao, $_GET['excluir_digitos']);
    $inserir_digitos = mysqli_escape_string($conexao, $_GET['inserir_digitos']);
    header("Location:formularioIpTrunk.php?discagem_peer=$discagem_peer&excluir_digitos=$excluir_digitos&inserir_digitos=$inserir_digitos&ip_peer_discagem=$ip_peer_discagem&contexto_sip_peer=$contexto_sip_peer&static_peer=$static_peer");  
    //echo("$ip_peer_discagem is not a valid IP address");
  }
  
  ?>

