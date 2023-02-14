<?php

$conn = require('connect.php');
/*$id = $_GET['id'];
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];
$nome = $_GET['nome'];
$email = $_GET['email'];*/

$sql = "UPDATE usuario SET usuario= ?,senha=?,nome=?,email=? WHERE id=?";

//mysqli_query($conn, $query);
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $usuario, $senha, $nome, $email, $id);
$stmt->execute();
echo $mysqli_affected_rows . "<br>";
//mysqli_close($conn);

?>
<p class="alert-success">
        Atualizado com sucesso!
    </p>



