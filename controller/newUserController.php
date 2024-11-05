<?php

include('../model/db.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$turma = $_POST['turma'];


$query = "INSERT INTO usuario (nomeUsuario, emailUsuario, senhaUsuario, turmaUsuario, dataCadastro) 
          VALUES ('$nome', '$email', '$password', '$turma', now());";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "<script> alert('Usuario cadastrado com sucesso!');
    window.location.href = '../view/list_users.php';
    </script>";
} else {
    echo "<script> alert('Ocorreu um erro, tente novamente.');
    window.location.href = '../view/cadastro.php';
    </script>";
}
