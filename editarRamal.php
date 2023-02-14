<?php 

include 'connect.php';
include 'comum.php';



//echo $ramal = $_GET['ramal'];
//echo '<br>'; 

if (isset($_GET['ramal'])):
   $ramal = mysqli_escape_string($conexao, $_GET['ramal']);
  
   $sql = "SELECT name, secret, ipaddr,host,context  FROM sippeers WHERE name = '$ramal'";
   $consulta = mysqli_query($conexao, $sql);
   $dados = mysqli_fetch_array($consulta);
   //var_dump($dados) ;
   //print_r($dados);


endif;
//header ('location:consultaRamal_3.php');

?>
<body>    
<div class=" ">
<div class="row">
    <div class="container col-sm-12 col-md-8">
        <form action="editRamal.php" method="GET">
            <div class="form-group col-sm-12 col-md-6">
                <label  class="mt-5" for="">Conta Ramal Sip</label>
                <input name="rama_sip" type="text" class="form-control" id=""  placeholder=""  readonly="readonly" value="<?php echo $dados ['name']; ?>">
                <small  class="form-text text-muted">Digite aqui a conta SIP.</small>
           
                <label for="">Senha :</label>
                <input name="senha_ramal_sip" type="password" class="form-control" id=""  placeholder=""   value="<?php echo $dados ['secret']; ?>">
                <small  class="form-text text-muted">Digite aqui senha.</small>
            
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Permição de chamadas</label>
                    <select name="contexto_ramal_sip" class="form-control" id="exampleFormControlSelect1">
                    <option value="<?php echo $dados['context']?>" selected><?php echo $dados['context']?></option>
                    <option value="phones" >phones</option>
                    <option value="phones-local" >phones-local</option>
                    <option value="phones-local-celular" >phones-local-celular</option>
                    <option value="phones-ddd-fixo" >phones-ddd-fixo</option>
                    <option value="phones-ddd-fixo-celular" >phones-ddd-fixo-celular</option>
                    <option value="phones-ddi" >phones-ddi</option>
                    </select>
                </div>
                           
        
              
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