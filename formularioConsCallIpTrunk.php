<?php
include 'comum.php';

?>

<body>    
  

        <div class="container col-sm-12 col-md-12">
            <form action="consultaDiscagemTrunk_1.php" method="GET">
            <div class="row">

                <div class="col-sm-3 col-md-3">
                        
                </div>
                <div class="form-group col-sm-6 col-md-6">
                    <label  class="mt-5" for="">Consultar regras de discagens com ...</label>
                    <input  name="exten" type="text" class="form-control" id=""  placeholder="" autofocus >
                    <small  class="form-text text-muted">Digite aqui .</small>
                    <label  class="mt-2" for="">Consultar quem pode discar com ...</label>
                    <input  name="contexto" type="text" class="form-control" id=""  placeholder="" >
                    <small  class="form-text text-muted">Digite aqui .</small>
                    <button type="submit" class="btn btn-primary col-sm-12 col-md-12">Consultar</button>
                </div>
            </div>
            </form>
        </div>



</body>
<!-- os scrips vem do comum.php -->
</html>