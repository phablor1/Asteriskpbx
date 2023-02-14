<?php

//echo $data_hora_final = $_POST['data_hora_final'];
include 'comum.php';
include 'connect.php';

 $exten = $_GET['exten'];
$contexto = $_GET['contexto'];
 
$sql = "SELECT id, context,exten,app,appdata
        FROM extensions WHERE 
        context LIKE '%$contexto%' AND
        exten LIKE '%$exten%' AND 
        tipo_discagem = 'trunk'"; // flag criado a mais na tabela para selecionar o que ip trunk ou ramal 
        //between ja tem o like imbutido 
?>
<body>
<div class="row">.</div>   
<div class=" ">
    <table  class=" container table  table-hover  table-borderless " id="dataTable">
        <thead>
            <tr class="ramais_head" >
                <th>Quem pode discar</th>    
                <th>Numero discado</th>    
                <th>Digitos Exluidos</th>    
                <th>Digitos inseridos</th>    
                <th>Ip Trunk de destino</th>    
                <th>Alterar regra de discagem</th>  
                <!-- <th>Deletar</th>   -->
            </tr>
        </thead>
        <tbody>
        <?php
        $busca = mysqli_query($conexao,$sql);
            while ($dados = mysqli_fetch_array($busca)){
                $id = $dados['id'];
                $context = $dados['context'];
                $app = $dados['app'];
                                
                $exten = str_split($dados['exten']); // recebe o valor de exten e o divide em um array
                unset($exten[0]);  // exclui a posição zero que o '_' que vem do banco na frente do numero 
                $exten=implode($exten); // junta os valores do array em uma string novamete
            
                //código linpa qdo é discagem interna 
                $appdata = str_split ($dados['appdata']); // recebe o valor de exten e o divide em um array
                unset($appdata[0]); // exclui a posição zero que o 'S' de SIP/ que vem do banco na frente do numero 
                unset($appdata[1]); // exclui a posição zero que o 'I' de SIP/ que vem do banco na frente do numero 
                unset($appdata[2]); // exclui a posição zero que o 'P' de SIP/ que vem do banco na frente do numero 
                unset($appdata[3]); // exclui a posição zero que o '/' de SIP/ que vem do banco na frente do numero 
                $appdata=implode($appdata);
                $appdata=substr_replace($appdata ,"", -4); // retira do final da string o valor ",120"
                    
                
                //código limpa qdo é discagem externa "sip trunk"
                //exclui tudo após o caracter '}', limpesa para pegar só o digito prefixado
                //usa o valor recebido da função strpos para mostrar onde ira constar o campo do caracter } ja que será 
                //--de tamnaho variavel
	     	 $dinamic_exclude = strpos($appdata, "}");
                 $digitos_excluidos = substr($appdata, 0, $dinamic_exclude);
                // $digitos_excluidos = substr($appdata, 0, strpos($appdata, "}"));
                
                //exclui tudo antes  do caracter '@'
                //limpesa para aparecer só endereço ip do peer
                $encontrar = ':';
                $digit_strip = $digitos_excluidos;
                $encontrado = stripos($digit_strip, $encontrar);
                if ($encontrado === false) {
                     $digit_strip;
                }else{
	        
                   $digit_strip =  stristr($digit_strip, ':');
                   $digit_strip = substr($digit_strip,1);
                }
                
		
	 
	    
                //código limpa qdo é discagem externa "sip trunk"
                //exclui tudo após o caracter '$', limpesa para pegar só o digito prefixado
                $digitos_inseridos = substr($appdata, 0, strpos($appdata, "$"));
                
                //exclui tudo antes  do caracter '@'
                //limpesa para aparecer só endereço ip do peer
                $encontrar = '@';
                $ip_peer =$appdata;
                $encontrado = stripos($ip_peer, $encontrar);
                if ($encontrado === false) {
                     $ip_peer;
                }else{
                     $ip_peer =  stristr($ip_peer, '@'); //remove tudo até o @
                      $ip_peer = substr($ip_peer,1); // inicia na primeira casa que é o primeiro numero do endereço IP
                }

        ?>
            <tr class="b-0">
                <td class="p-0 m-0 ramais ">
                    <p class="lead text-center"><?php echo $context?></p>    
                </td>
                
                <td class="m-0 p-0 ramais lead text-left ">
                    <p class="lead text-center"><?php echo $exten?></p>
                </td>

		<?php
		               
                //e por fim valida se não for inserido nenhum digit_strip a string iria iniciar com ${EXTEN}..
                //AQUI fazemos a limpesa
                   
		   
                  $digit_strip = str_split($digit_strip);
	       	  if ($digit_strip[0]==="$"){
                     $digit_strip[0]=NULL;
		  
                ?>
                  <td class="m-0 p-0 ramais lead text-left ">
                    <p class="lead text-center"><?php echo $digit_strip[0]?></p>
                  </td>
                <?php
		 }else{
	          
                   $digit_strip=implode($digit_strip);
                ?>    
                 <td class="m-0 p-0 ramais lead text-left ">
                   <p class="lead text-center"><?php echo $digit_strip ?></p>
                 </td>

                <?php 
                }
  
		?>


                <td class="m-0 p-0 ramais lead text-left ">
                    <p class="lead text-center"><?php echo $digitos_inseridos?></p>
                </td>

                <td class="m-0 p-0 ramais lead text-left ">
                    <p class="lead text-center"><?php echo $ip_peer?></p>
                </td>
    
                <td class="ramais m-0 p-0 b-0">
                <div class="botao_editar">
                    <a href="editarIpTrunk.php?id_discagem=<?php echo $id?>" class="btn btn-sucess btn-lg btn-block">
                    <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Editar Discagem</a>
                </div>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>

