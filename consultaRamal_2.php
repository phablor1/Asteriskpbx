<?php

//echo $data_hora_final = $_POST['data_hora_final'];
include 'comum.php';
include 'connect.php';
$rama_sip = $_POST['rama_sip'];
 
$sql = "SELECT name,ipaddr,context
        FROM sippeers WHERE 
        name LIKE '%$rama_sip%'";
        //between ja tem o like imbutido 
?>
<body>
<div class="row">.</div>   

<div class=" ">

    <table  class=" container table  table-hover  table-borderless " id="dataTable">
        <thead>
            <tr class="ramais_head" >
                <th>Ramal</th>    
                <th>Endereço IP - Status</th>    
                <th>Tipos de chamadas permitidas</th>  
                <th>Deletar</th>  
            </tr>
        </thead>
        <tbody>
        <?php
        $busca = mysqli_query($conexao,$sql);
            while ($dados = mysqli_fetch_array($busca)){
                $name = $dados['name'];
                $ipaddr = $dados['ipaddr'];
                $context = $dados['context'];
            
            //$dados = mysqli_fetch_array($dados);
            ?>
            <tr class="b-0">
                <td class="p-0 m-0 ramais ">
                    <!-- <div class="alert alert-primary   "> -->
                    <p class="lead text-center"><?php echo $name?></p>    
    
                </td>
    
                <td class="p-0 m-0">
                    <?php //echo $ipaddr
                    if ($ipaddr == NULL){
                    ?>
                    
                    <div   class="ramal_nao_registrado" >
                        <p class=" lead text-center"><strong> <i class="fas fa-phone-slash"></i>&nbsp;&nbsp;-&nbsp;&nbsp;Ungestered</strong></p>
                    </div> 
                    
                    <?php
                    }else { ?>
                    
                    <div class="ramal_registrado">
                        <p class=" lead text-center"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;-&nbsp;&nbsp;Registered :<strong><?echo $ipaddr?></strong> </p> 
                    </div>
                    
                    <?php
                    }
                    ?>
                </td>
    
                <td class="m-0 p-0 ramais lead text-left "><?php echo $context?></td>
    
                <td class="ramais m-0 p-0 b-0">
                <div class="botao_delete">
                    <a href="deleteRamal.php?ramal=<?php echo $name?>" class="btn btn-sucess btn-lg btn-block">
                    <i class="far fa-trash-alt"></i>&nbsp;&nbsp;Deletar</a>
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

