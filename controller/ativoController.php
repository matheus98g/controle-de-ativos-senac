<?php

// cadastrar ativo


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


// edição de ativos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAtivo = $_POST['idAtivo'];
    $descricao = $_POST['descricaoAtivo'];
    $quantidade = $_POST['qtdAtivo'];
    $observacao = $_POST['obsAtivo'];

    try {
        if (!empty($idAtivo)) {
            // Atualizar ativo existente
            $query = "UPDATE ativo SET descricaoAtivo = ?, qtdAtivo = ?, obsAtivo = ? WHERE idAtivo = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sisi', $descricao, $quantidade, $observacao, $idAtivo);
        } else {
            // Inserir novo ativo
            $query = "INSERT INTO ativo (descricaoAtivo, qtdAtivo, obsAtivo) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sis', $descricao, $quantidade, $observacao);
        }

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao executar a query.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
