<?php
session_start();
include_once('../model/db.php');

$email = $_POST['email'];
$senha = $_POST['password'];

$senhaCrip = base64_encode($senha); // Corrigido a sintaxe do base64_encode
$sql = "SELECT COUNT(*) AS quantidade, idUsuario FROM usuario WHERE emailUsuario = '$email' AND senhaUsuario = '$senhaCrip'";

$result = mysqli_query($db, $sql) or die('Erro na consulta: ' . mysqli_error($db));

$dados = $result->fetch_assoc();

if ($dados['quantidade'] > 0) {
    $_SESSION['login_ok'] = true;
    $_SESSION['controle_login'] = true;
    $_SESSION['id_user'] = $dados['idUsuario'];
    header('location:../view/dashboard.php');
} else {
    $_SESSION['login_ok'] = false;
    unset($_SESSION['controle_login']);
    header('location:../view/login.php?error_auth=s');
}
