<?php
include('../model/db.php'); // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAtivo = intval($_POST['idAtivo']);
    $statusAtivo = intval($_POST['statusAtivo']);

    if ($idAtivo && isset($statusAtivo)) {
        $sql = "UPDATE ativo SET statusAtivo = ?, dataAlteracao = NOW() WHERE idAtivo = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ii", $statusAtivo, $idAtivo);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Status atualizado com sucesso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o status.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Parâmetros inválidos.']);
    }
}
