<?php

include 'comum.php';

?>

<body>    
    
      <div class="container col-sm-12 col-md-12">
          <form action="incerirDiscagem.php" method="POST">
             <div class="row">
                 <div class="col-sm-3 col-md-3">
                     
                 </div>
                 <div class="form-group col-sm-6 col-md-6">
                    <label  class="mt-5" for="">Discagem  </label>
                    <input name="discagem" type="text" class="form-control" id=""  placeholder="" autofocus required>
                    <!-- <small  class="form-text text-muted">&nbsp;</small> -->
                    <label  class="mt-3" for="">Destino </label>
                    <input name="destino" type="text" class="form-control" id=""  placeholder="" autofocus required>
                    <small  class="form-text text-muted">&nbsp;</small>
                    
                    <label for="exampleFormControlSelect1">Vincular aos ramais do  contexto </label>
                    <select name="contexto_discagem" class="form-control" id="exampleFormControlSelect1">
                        <option value="phones" >phones</option>
                        <option value="phones-local" >phones-local</option>
                        <option value="phones-local-celular" >phones-local-celular</option>
                        <option value="phones-ddd-fixo" >phones-ddd-fixo</option>
                        <option value="phones-ddd-fixo-celular" >phones-ddd-fixo-celular</option>
                        <option value="phones-ddi" >phones-ddi</option>
                    </select>
                    <small  class="form-text text-muted">Para usar essa regra o ramal deve estar no contexto selecionado</small>
                    <button type="submit" class="btn btn-primary col-sm-12 col-md-12">Salvar</button>
                </div>
            </div>
          </form>
      </div>
 




</body>
</html>