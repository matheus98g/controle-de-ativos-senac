<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include('../model/db.php');

    // Consulta SQL para listar os usuários e turmas
    $list_users = "SELECT idUsuario, nomeUsuario, turmaUsuario FROM usuario";
    $result = mysqli_query($db, $list_users);
    $dados = $result->fetch_assoc();

    // Verificando se a consulta retornou resultados
    if (!$dados) {
        echo "<script> alert('Ocorreu um erro ao listar usuarios');</script>";
    } else {
    ?>
        <div class="p-4 w-50 ">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Turma</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Percorrendo os resultados da consulta
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['idUsuario']); ?></td>
                            <td><?php echo htmlspecialchars($row['nomeUsuario']); ?></td>
                            <td><?php echo htmlspecialchars($row['turmaUsuario']); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
</body>

</html>