<?php
include('../controller/sessionController.php');
include('../includes/head.php'); //scripts e html principal
$data = get_data($db, 'ativo'); // get data usa um modelo de SELECT
?>

<script src="../js/ativos.js"></script>

<body>
    <?php
    include('../includes/menu.php')
    ?>

    <div class="container p-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar novo</button>

        <?php
        include_once('../includes/modal_ativos.php');
        ?>
    </div>

    <div class="container" id="tabela-ativos">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Cadastrado em</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $ativo) {
                ?>
                    <tr>
                        <td><?php echo $ativo['idAtivo']; ?></td>
                        <td><?php echo $ativo['descricaoAtivo']; ?></td>
                        <td><?php echo $ativo['qtdAtivo']; ?></td>
                        <td><?php echo $ativo['obsAtivo']; ?></td>
                        <td><?php echo $ativo['dataCadastro']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>