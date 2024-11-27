<?php

// controlador para cadastrar ativo


include_once('../model/db.php');
include_once('sessionController.php');

$ativo = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$observacao = $_POST['observacao'];
$userId = $_SESSION['id_user'];

$query = "INSERT INTO ativo (descricaoAtivo, qtdAtivo, obsAtivo, dataCadastro, idUsuario)
          VALUES ('$ativo', '$quantidade', '$observacao', now(), $userId)";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "Cadastro realizado";
}
