<?php

include('../model/db.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = base64_encode($_POST['password']);
$turma = $_POST['turma'];


$query = "INSERT INTO usuario (nomeUsuario, emailUsuario, senhaUsuario, turmaUsuario, dataCadastro) 
          VALUES ('$usuario', '$email', '$password', '$turma', now());";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "<script> alert('Usuario cadastrado com sucesso!');
    window.location.href = '../view/login.php';
    </script>";
} else {
    echo "<script> alert('Ocorreu um erro, tente novamente.');
    window.location.href = '../view/cadastro.php';
    </script>";
}
