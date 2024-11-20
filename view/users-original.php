<?php
include('../controller/sessionController.php');
include('../includes/head.php'); // scripts e html principal
?>

<body>
    <?php include('../includes/menu.php'); ?>
    <div class="container mt-4">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Email</th>
                    <th scope="col">Turma</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $user) {
                ?>
                    <tr>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario']; ?>" class="text-decoration-none">
                                <?php echo $user['idUsuario']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario']; ?>" class="text-decoration-none">
                                <?php echo $user['nomeUsuario']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario']; ?>" class="text-decoration-none">
                                <?php echo $user['emailUsuario']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario']; ?>" class="text-decoration-none">
                                <?php echo $user['turmaUsuario']; ?>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>