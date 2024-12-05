<?php
include('../model/db.php'); // Inclui a conexão com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idAtivo']; // ID do ativo
    $descricao = $_POST['descricaoAtivo']; // Descrição do ativo
    $qtd = $_POST['qtdAtivo']; // Quantidade do ativo
    $obs = $_POST['obsAtivo']; // Observação do ativo
    $marca = $_POST['marca']; // Marca do ativo
    $tipo = $_POST['tipo']; // Tipo do ativo

    // Valida os dados antes de salvar no banco
    if (empty($id) || empty($descricao) || empty($qtd) || empty($obs) || empty($marca) || empty($tipo)) {
        echo "<script>alert('Por favor, preencha todos os campos.'); history.back();</script>";
        return;
    }

    // Prepara a consulta para atualizar os dados
    $query = "UPDATE ativo SET descricaoAtivo = ?, qtdAtivo = ?, obsAtivo = ?, marca = ?, tipo = ? WHERE idAtivo = ?";
    $stmt = mysqli_prepare($db, $query);

    if ($stmt) {
        // Faz o bind dos parâmetros e executa a consulta
        mysqli_stmt_bind_param($stmt, 'isissi', $descricao, $qtd, $obs, $marca, $tipo, $id);
        if (mysqli_stmt_execute($stmt)) {
            // Exibe alerta de sucesso e redireciona
            echo "<script>window.location.href = '../view/ativos.php';</script>";
        } else {
            // Exibe alerta de erro
            echo "<script>alert('Erro ao atualizar o ativo: " . mysqli_error($db) . "'); history.back();</script>";
        }
        mysqli_stmt_close($stmt); // Fecha o statement mesmo após erro ou sucesso
    } else {
        // Exibe alerta de erro na preparação da consulta
        echo "<script>alert('Erro na preparação da consulta: " . mysqli_error($db) . "'); history.back();</script>";
    }
}
