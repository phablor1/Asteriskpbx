<?php
$ob_conn = require 'connect.php';

$usuario = $_GET['usuario'];
$senha = $_GET['senha'];
$nome = $_GET['nome'];
$email = $_GET['email'];

$sql = "insert into usuario(usuario,senha,nome,email) values ('{$usuario}','{$senha}','{$nome}','{$email}')";

mysqli_query($ob_conn, $sql);
mysqli_close($ob_conn);
?>
<p class="alert-success">
        Usuario: <?= $usuario; ?>, <br>Senha: <?= $senha; ?>,<br>Nome: <?= $nome;?>,<br>Email: <?=$email;?><br> - adicionado com sucesso!
    </p>

    <?php
//$prepare = $ob_conn->prepare($sql);

/*$prepare->bindParam(1,$_GET['usuario']);
$prepare->bindParam(2,$_GET['senha']);
$prepare->bindParam(3,$_GET['nome']);
$prepare->bindParam(4,$_GET['email']);
$prepare->execute();

echo $prepare->rowCount();*/
//var_dump($prepare);
//echo "<pre>";print_r($_GET);echo "</pre>";exit;?>