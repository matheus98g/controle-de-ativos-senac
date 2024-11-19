<?php
include_once('../model/db.php');

$email = $_POST['email'];
$senha = $_POST['password'];

$senhaCrip = base64_encode(string: $senha);
$sql = "Select

count(*) as quantidade

from usuario

where

emailUsuario = '$email'

and senhaUsuario = '$senhaCrip'";

$result = mysqli_query($db, $sql) or die(false);

$dados = $result->fetch_assoc();
if ($dados['quantidade'] > 0) {
    echo 'login permitido';
} else {

    echo 'senha ou usuario invalido';
}
