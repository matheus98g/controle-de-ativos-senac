<?php
session_start();
include_once('../model/db.php');

$email = $_POST['email'];
$senha = $_POST['password'];

$senhaCrip = base64_encode($senha); // Corrigido a sintaxe do base64_encode
$sql = "SELECT COUNT(*) AS quantidade FROM usuario WHERE emailUsuario = '$email' AND senhaUsuario = '$senhaCrip'";

$result = mysqli_query($db, $sql) or die('Erro na consulta: ' . mysqli_error($db));

$dados = $result->fetch_assoc();

if ($dados['quantidade'] > 0) {
    // Se o login for válido, redireciona para a lista de usuários
    header('Location: ../view/list-users.php');
    exit(); // Garante que o script não continue após o redirecionamento
} else {
    // Se o login for inválido, exibe um alerta JavaScript
    echo "<script>alert('Usuário ou senha inválidos'); window.location.href='../view/login.php';</script>";
}
