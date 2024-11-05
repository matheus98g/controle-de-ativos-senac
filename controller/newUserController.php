<?php

include('../model/db.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = $_POST['password'];
$turma = $_POST['turma'];


$query = "INSERT INTO usuario (nomeUsuario, emailUsuario, senhaUsuario, turmaUsuario, dataCadastro) VALUES ('$nome', '$email', '$password', '$turma', now());";

$result = mysqli_query($db, $query) or die(false);

echo "$nome <br> $email <br> $password <br> $turma";
