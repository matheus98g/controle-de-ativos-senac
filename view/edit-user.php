<?php
include_once('../model/db.php');
include_once('../controller/getDataController.php');

// Verifica se o ID foi passado na URL
if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
    $edit_user = $_GET['id_usuario']; // Captura o ID do usuário
    // Obtém os dados do usuário com o ID fornecido
    $data = get_data($db, 'usuario', 'idUsuario', $edit_user);
} else {
    // Se o idUsuario não for passado corretamente, redireciona ou mostra um erro
    echo "<script>alert('ID de usuário não fornecido'); window.location.href = '../view/list_users.php';</script>";
    exit();
}

// Verifica se encontrou algum usuário com o ID fornecido
if (empty($data)) {
    echo "<script>alert('Usuário não encontrado'); window.location.href = '../view/list_users.php';</script>";
    exit();
}

// Inicializa as variáveis com os dados do usuário
foreach ($data as $user) {
    $id = $user['idUsuario'];
    $nome = $user['nomeUsuario'];
    $email = $user['emailUsuario'];
    $turma = $user['turmaUsuario'];
}
?>

<?php
include('../includes/head.php');
?>

<div class="container mt-5">
    <h2 class="text-center">Editar Usuário</h2>
    <form action="../controller/editUserController.php" method="POST">

        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>" required>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($nome); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="mb-3">
            <label for="turma" class="form-label">Turma:</label>
            <input type="text" id="turma" name="turma" class="form-control" value="<?php echo htmlspecialchars($turma); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar</button>
    </form>
</div>

</body>

</html>