<?php 

include 'connect.php';
include 'comum.php';


//echo '<br>'.$id_discagem =$_GET['id_discagem'];
//echo '<br>'.$exten = $_GET['exten'];
//echo '<br>'.$dados['context']= $_GET['contexto_discagem'];
//echo '<br>'.$destino_exten = $_GET['destino_exten'];
//echo '<br>'.$excluir_digitos = $_GET['excluir_digitos'];
//echo '<br>'.$digitos_inseridos = $_GET['inserir_digitos'];

if (isset($_GET['id_discagem'])):
   $id = mysqli_escape_string($conexao, $_GET['id_discagem']);
  
   $sql = "SELECT id, context, exten, priority, app, appdata   FROM extensions WHERE id = '$id'";
   $consulta = mysqli_query($conexao, $sql);
   $dados = mysqli_fetch_array($consulta);
   
   $exten = str_split($dados['exten']); // recebe o valor de exten e o divide em um array
   unset($exten[0]);  // exclui a posição zero que o '_' que vem do banco na frente do numero 
   $exten=implode($exten); // junta os valores do array em uma string novamete

   $appdata =str_split ($dados['appdata']); // recebe o valor de exten e o divide em um array
   unset($appdata[0]); // exclui a posição zero que o 'S' de SIP/ que vem do banco na frente do numero 
   unset($appdata[1]); // exclui a posição zero que o 'I' de SIP/ que vem do banco na frente do numero 
   unset($appdata[2]); // exclui a posição zero que o 'P' de SIP/ que vem do banco na frente do numero 
   unset($appdata[3]); // exclui a posição zero que o '/' de SIP/ que vem do banco na frente do numero 
   $appdata=implode($appdata);
   $appdata=substr_replace($appdata,"", -4); // retira do final da string o valor ",120"

   
                //código limpa qdo é discagem externa "sip trunk"
                //exclui tudo após o caracter '}', limpesa para pegar só o digito prefixado
                $digitos_excluidos = substr($appdata, 0, strpos($appdata, "}"));
                
                //exclui tudo antes  do caracter '@'
                //limpesa para aparecer só endereço ip do peer
                $encontrar = ':';
                $digit_strip =$digitos_excluidos;
                 $encontrado = stripos($digit_strip, $encontrar);
                if ($encontrado === false) {
                     $digit_strip;
                }else{
                     $digit_strip =  stristr($digit_strip, ':');
                     $digit_strip = (substr($digit_strip,1));
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
                     $ip_peer =  stristr($ip_peer, '@');
                     $ip_peer = (substr($ip_peer,1));
                }


endif;

?>
<body>    
    <div class="container col-sm-12 col-md-12">
        <form action="editIpTrunk.php" method="GET">
            <div class="row">
            <div class="col-sm-3 col-md-3">
                     
             </div>

                <div class="form-group col-sm-6 col-md-6">
                    
                    <input type="hidden" name="id_discagem" value="<?php echo $id?>">
                    
                    <label  class="mt-5" for="">Discagem para o Tronco SIP</label>
                    <input name="exten" type="text" class="form-control" id=""  placeholder=""   value="<?php echo $exten; ?>">
                <small  class="form-text text-muted">Digite o numero a ser dicado</small>
                
                <div class="m-0 p-0  col-md-12">
                <?php
                //e por fim valida se não for inserido nenhum digit_strip a string iria iniciar co ${EXTEN}..
                //AQUI fazemos a limpesa
                  
                  $digit_strip = str_split($digit_strip);
                  if ($digit_strip[0]==="$"){
                      $digit_strip=NULL;
                      ?>
                    <label >Excluir digitos da discagem</label>
                    <select name="excluir_digitos" class="form-control" id="exampleFormControlSelect1">
                        <option selected value="<?php echo $excluir_digitos?>"><?php echo $excluir_digitos?></option>
                        <option value="" ></option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                    </select>
                <?php 
                }else{
                $digit_strip=implode($digit_strip); //pega a parte do array que imprime só o digit_strip
                ?>
                 <label >Excluir digitos da discagem</label>
                 <select name="excluir_digitos" class="form-control" id="exampleFormControlSelect1">
                     <option selected value="<?php echo $digit_strip?>" ><?php echo $digit_strip?></option>
                     <option value="" ></option>
                     <option value="1" >1</option>
                     <option value="2" >2</option>
                     <option value="3" >3</option>
                     <option value="4" >4</option>
                     <option value="5" >5</option>
                     <option value="6" >6</option>
                     <option value="7" >7</option>
                     <option value="8" >8</option>
                     <option value="9" >9</option>
                     <option value="10" >10</option>
                    </select>
                    
                    
                    <?php 
                }
                ?>
                
                <label class="mt-3" for="">incerir Digitos </label>
                <input name="inserir_digitos" type="text" class="form-control" id=""  placeholder="" value="<?php echo $digitos_inseridos;?>"  >
                <small  class="form-text text-muted">incerir </small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Quem pode discar esse numero </label>
                <select name="contexto_discagem" class="form-control" id="exampleFormControlSelect1">
                    <option value="<?php echo $dados['context']?>" ><?php echo $dados ['context']?></option>
                    <option value="phones">phones</option>
                    <option value="phones-local">phones-local</option>
                    <option value="phones-local-celular">phones-local-celular</option>
                    <option value="phones-ddd-fixo">phones-ddd-fixo</option>
                    <option value="phones-ddd-fixo-celular">phones-ddd-fixo-celular</option>
                    <option value="phones-ddi">phones-ddi</option>
                </select>
            </div>
            
            
            <label for="">Destino IP do numero discado </label>
            <input  name="destino_exten" type="text" class="form-control" id=""  placeholder=""   value="<?php echo $ip_peer; ?>">
            <small  class="form-text text-muted">Digite o destino do numero discado.</small>
            
            <button type="submit" class=" btn btn-primary col-sm-12 col-md-12">Editar</button>
        </div>
        
    </form>

    


    


<!-- 
<script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->


</body>
<!-- os scrips vem do comum.php -->
</html>






