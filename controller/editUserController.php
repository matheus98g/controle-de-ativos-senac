<?php
// Incluir o arquivo de conexão com o banco de dados
include('../model/db.php');

// Verificar se o ID foi passado
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Recuperar os dados do usuário
    $query = "SELECT * FROM usuario WHERE idUsuario = '$id'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    // Verificar se o usuário foi encontrado
    if (!$user) {
        // Se não encontrar, redirecionar
        echo "<script>alert('Usuário não encontrado'); window.location.href = '../view/dashboard.php';</script>";
        exit();
    }
} else {
    // Se não passar o ID, redirecionar
    echo "<script>alert('ID não fornecido'); window.location.href = '../view/dashboard.php';</script>";
    exit();
}

// Se o formulário for enviado via POST, realizar a atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $turma = $_POST['turma'];
    $id = $_POST['id'];

    // Atualizar os dados do usuário
    $updateQuery = "UPDATE usuario SET nomeUsuario = '$nome', emailUsuario = '$email', turmaUsuario = '$turma' WHERE idUsuario = '$id'";
    if (mysqli_query($db, $updateQuery)) {
        // Se a atualização for bem-sucedida, redirecionar para a lista de usuários
        echo "<script>alert('Usuário atualizado com sucesso'); window.location.href = '../view/users.php';</script>";
    } else {
        // Caso ocorra um erro
        echo "<script>alert('Erro ao atualizar usuário'); window.location.href = '../view/users.php';</script>";
    }
}
