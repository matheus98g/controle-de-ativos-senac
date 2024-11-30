<?php
include('../controller/sessionController.php');
include('../includes/head.php'); // Scripts e HTML principal
include_once('../controller/getDataController.php');

// Obter todos os ativos
// $data = get_data($db, 'ativo'); // Ajuste o nome da tabela para "ativo"

$marcas = get_data($db, 'marca');
$tipos = get_data($db, 'tipo');

$sql = "SELECT 
            idAtivo, 
            descricaoAtivo, 
            qtdAtivo, 
            statusAtivo, 
            obsAtivo, 
            (SELECT descricaoMarca from marca m WHERE m.idMarca = a.idMarca) as marca, 
            (SELECT descricaoTipo from tipo t WHERE t.idTipo = a.idTipo) as tipo, 
            dataCadastro, 
            dataAlteracao, 
            (SELECT nomeUsuario from usuario u WHERE u.idUsuario = a.idUsuario) as usuario
            FROM ativo a";

$result = mysqli_query($db, $sql) or die(false);
$ativos = $result->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ativos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../js/ativos.js"></script>
</head>

<body>
    <?php include('../includes/menu.php'); ?>

    <div class="container mt-4">
        <h2 class="text-center">Lista de Ativos</h2>
        <?php
        include_once('../includes/modal_ativos.php');
        ?>
        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cadastrar Ativo
        </button>
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Cadastrado por</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ativos as $ativo) {
                ?>
                    <tr>
                        <td><?php echo $ativo['idAtivo']; ?></td>
                        <td><?php echo $ativo['descricaoAtivo']; ?></td>
                        <td><?php echo $ativo['marca']; ?></td>
                        <td><?php echo $ativo['tipo']; ?></td>
                        <td><?php echo $ativo['qtdAtivo']; ?></td>
                        <td><?php echo $ativo['obsAtivo']; ?></td>
                        <td><?php echo $ativo['usuario']; ?></td>
                        <td><?php echo $ativo['dataCadastro']; ?></td>
                        <td>
                            <!-- Botão para abrir o modal -->
                            <button
                                class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editAtivoModal"
                                data-id="<?php echo $ativo['idAtivo']; ?>"
                                data-descricao="<?php echo htmlspecialchars($ativo['descricaoAtivo']); ?>"
                                data-quantidade="<?php echo htmlspecialchars($ativo['qtdAtivo']); ?>"
                                data-observacao="<?php echo htmlspecialchars($ativo['obsAtivo']); ?>">
                                Editar
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para Edição -->
    <div class="modal fade" id="editAtivoModal" tabindex="-1" aria-labelledby="editAtivoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAtivoModalLabel">Editar Ativo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/editAtivoController.php" method="POST">
                        <input type="hidden" id="modal-id" name="idAtivo">
                        <div class="mb-3">
                            <label for="modal-descricao" class="form-label">Descrição:</label>
                            <input type="text" id="modal-descricao" name="descricaoAtivo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-quantidade" class="form-label">Quantidade:</label>
                            <input type="number" id="modal-quantidade" name="qtdAtivo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-observacao" class="form-label">Observação:</label>
                            <textarea id="modal-observacao" name="obsAtivo" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preencher o modal com os dados do ativo ao clicar em "Editar"
        const editAtivoModal = document.getElementById('editAtivoModal');
        editAtivoModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Botão que acionou o modal
            const id = button.getAttribute('data-id');
            const descricao = button.getAttribute('data-descricao');
            const quantidade = button.getAttribute('data-quantidade');
            const observacao = button.getAttribute('data-observacao');

            // Preenche os campos do modal
            document.getElementById('modal-id').value = id;
            document.getElementById('modal-descricao').value = descricao;
            document.getElementById('modal-quantidade').value = quantidade;
            document.getElementById('modal-observacao').value = observacao;
        });
    </script>
</body>