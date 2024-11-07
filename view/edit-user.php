<?php
include_once('../model/db.php');
include_once('../controller/getDataController.php');
$edit_user = $_GET['id_usuario'];
$data = get_data($db, 'usuario', 'idUsuario', $edit_user);

//verifica se o ID foi passado na URL
if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
    $edit_user = $_GET['id_usuario'];
} else {
    // Se o idUsuario não for passado corretamente, redirecione ou mostre um erro.
    echo "<script>alert('ID de usuário não fornecido'); window.location.href = '../view/list_users.php';</script>";
    exit();
}

foreach ($data as $user) {
    $nome = $user['nomeUsuario'];
    $turma = $user['turmaUsuario'];
}
?>

<?php
include('../includes/html-head.php');
?>

<div class="container mt-5">
    <h2 class="text-center">Editar Usuário</h2>
    <form action="../controller/editUserController.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($user['nomeUsuario']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['emailUsuario']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="turma" class="form-label">Turma:</label>
            <input type="text" id="turma" name="turma" class="form-control" value="<?php echo htmlspecialchars($user['turmaUsuario']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar</button>
    </form>
</div>

</body>

</html>