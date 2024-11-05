<?php

include('../model/db.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$turma = $_POST['turma'];


$query = "INSERT INTO usuario (nomeUsuario, emailUsuario, senhaUsuario, turmaUsuario, dataCadastro) VALUES ('$nome', '$email', '$password', '$turma', now());";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "Usuario cadastrado com sucesso!";
}
