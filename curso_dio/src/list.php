<?php

$conn = require 'connect.php';

$sql = 'SELECT id,usuario,nome,email FROM usuario';

$stmt = $conn->query($sql);
echo '<h3>Usuario :</h3>';
echo '<hr>';

while($value = $stmt->fetch_assoc()){
    echo 'Id:'.$value['id'].'<br>Usuario: '.$value['usuario'].'<br>Nome: '.$value['nome'].'<br>Email: '.$value['email'].'<hr>';
    //echo '<hr>';
}
mysqli_close($conn);
//$conn->close();
/*$resultado = $stmt->fetch_all($stmt,MYSQLI_ASSOC);

echo '<h3>Usuario :</h3>';
echo '<hr>';

//if($resultado){
//foreach ($conn->query($sql) as $key => $value)
foreach($resultado as $value) {
    //code...
    echo 'Id:'.$value['id'].'<br>Usuario: '.$value['usuario'].'<br>Nome: '.$value['nome'].'<br>Email: '.$value['email'].'<hr>';
    echo '<hr>';
}
//}
//$conn->close();

//var_dump($sql);