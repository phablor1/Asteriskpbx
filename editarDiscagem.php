<?php 

include 'connect.php';
include 'comum.php';



//echo $id = $_GET['id_discagem'];
//echo '<br>'; 

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
   $appdata=substr_replace($appdata,"", -4); // retira do final da string o valor ",120" do tempo de ring




endif;
//header ('location:consultaRamal_3.php');

?>


<body>    
    
<div class=" ">
<div class="row">
    <div class="container col-sm-12 col-md-8">
        <form action="editDiscagem.php" method="GET">
            <div class="form-group col-sm-12 col-md-6">
                
                <input type="hidden" name="id_discagem" value="<?php echo $id?>">
                
                <label  class="mt-5" for="">Numero a ser discado</label>
                <input name="exten" type="text" class="form-control" id=""  placeholder=""   value="<?php echo $exten; ?>">
                <small  class="form-text text-muted">Digite o numero a ser dicado</small>
           
                
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
                
                
                <label for="">Destino do numero discado </label>
                <input name="destino_exten" type="text" class="form-control" id=""  placeholder=""   value="<?php echo $appdata; ?>">
                <small  class="form-text text-muted">Digite o destino do numero discado.</small>
                
          </div>
                
            <button type="submit" class=" btn btn-primary col-sm-12 col-md-6">Update</button>
        </form>
    </div>
    
</div>
</div>
    


<!-- 
<script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->


</body>
<!-- os scrips vem do comum.php -->
</html>






