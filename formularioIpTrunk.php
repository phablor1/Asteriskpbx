<?php
include 'comum.php';

 $discagem_peer = $_GET['discagem_peer'];
 $ip_peer_discagem =$_GET['ip_peer_discagem'];
 $contexto_sip_peer =$_GET['contexto_sip_peer'];
 $static_peer = $_GET['static_peer'];
 $excluir_digitos = $_GET['excluir_digitos'];
 $inserir_digitos = $_GET['inserir_digitos'];

?>

<body>    
    <div class="container col-sm-12 col-md-12">
        <form action="incerirTrunk.php" method="GET">
            <div class="form-group col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-sm-3 col-md-3">

                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label  class="mt-5" for="">Discagem para o Tronco SIP</label>
                        <input name="discagem_peer" type="text" value="<?php echo $discagem_peer?>" class="form-control" id=""  placeholder=""  required >
                        <small  class="form-text text-muted">Digite aqui o encaminhamento para o PEER SIP.</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-md-3">
                    </div>
                    <div class="form-group col-sm-3 col-md-3">
                        <label >Excluir digitos da discagem</label>
                        <select name="excluir_digitos" class="form-control" id="exampleFormControlSelect1">
                            <option  selected value="<?php echo $excluir_digitos?>"><?php echo $excluir_digitos?></option>
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
                        <small  class="form-text text-muted">O valor  será excluido  na discagem</small>
                    </div>
                    <div class="form-group col-sm-3 col-md-3">
                        <label class="" for="">incerir Digitos </label>
                        <input name="inserir_digitos" type="text" value="<?php echo $inserir_digitos?>"class="form-control" id=""  placeholder=""   >
                        <small  class="form-text text-muted">O valor  será prefixado na discagem</small>
                    </div>
                </div>
                
                <?php 
                if ($ip_peer_discagem<>NULL){
                ?>
               <div class="row">
                    <div class="com-sm-3 col-md-3">

                    </div>
                   <div class="col-sm-6 col-md-6">
                    <label class="mt-3 text-danger" for="">Confira endereço ip do peer (endereço ip não é válido)</label>
                    <input  name="ip_peer_discagem" type="text" value="<?php echo $ip_peer_discagem?>" class="form-control" id=""  placeholder="" autofocus required >
                    <small  class="form-text text-muted text-danger">Endereço Ip </small>
                </div>  
                    
                    <?php }else{?>
                        
                        <div class="row">

                            <div class="col-sm-3 col-md-3">
                                
                        </div>
                        <div class="col-sm-6 col-md-6">
                            
                            <label class="mt-3 " for="">Endereço ip do peer</label>
                            <input  name="ip_peer_discagem" type="text" class="form-control" id=""  placeholder=""  required >
                            <small  class="form-text text-muted text-danger">Endereço Ip </small>
                            
                        </div>
                        
                    </div>
                    
                    <?php }?>    
                    
                </div>
               
               
                <div class="row">
                <div class="col-sm-3 col-md-3">
                </div>
                <div class="form-group mt-2 col-sm-6 col-md-6">
                <label >SIP Peer pertence ao contexto</label>
                <select name="contexto_sip_peer" class="form-control" id="exampleFormControlSelect1">
                    <option  selected value="<?php echo $contexto_sip_peer?>"><?php echo $contexto_sip_peer?></option>
                    <option value="phones" >phones</option>
                    <option value="phones-local" >phones-local</option>
                    <option value="phones-local-celular" >phones-local-celular</option>
                    <option value="phones-ddd-fixo" >phones-ddd-fixo</option>
                    <option value="phones-ddd-fixo-celular" >phones-ddd-fixo-celular</option>
                    <option value="phones-ddi" >phones-ddi</option>
                    </select>
        
                    <label for="">Tipo de host Static </label>
                    <input  name="static_peer"  readonly="readonly" value ="static" type="text" class="form-control" id=""  placeholder=""  >
                    <small class="form-text text-muted"></small>
                    <button type="submit" class="mt-2 btn btn-primary col-sm-12 col-md-12">Salvar</button>
                </div>
            </div>
          </div>
        </form>
    </div>
    

</body>
</html>