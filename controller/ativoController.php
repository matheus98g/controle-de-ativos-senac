<?php

// controlador para cadastrar ativo


include_once('../model/db.php');

$ativo = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$observacao = $_POST['observacao'];

$query = "INSERT INTO ativo (descricaoAtivo, qtdAtivo, obsAtivo, dataCadastro)
          VALUES ('$ativo', '$quantidade', '$observacao', now())";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "<script> alert('Ativo cadastrado com sucesso!');
    window.location.href = '../view/ativos.php';
    </script>";
} else {
    echo "<script> alert('Ocorreu um erro, tente novamente.');
    window.location.href = '../view/ativos.php';
    </script>";
}
