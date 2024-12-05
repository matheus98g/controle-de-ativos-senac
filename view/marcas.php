<?php
include('../controller/sessionController.php');
include('../includes/head.php'); //scripts e html principal
$data = get_data($db, 'marca'); // get data usa um modelo de SELECT
?>

<script src="../js/marca.js"></script>

<body>
    <?php
    include('../includes/menu.php')
    ?>

    <div class="container p-4">
        <h2 class="text-center">Lista de Marcas</h2>
        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#marcaModal" data-bs-whatever="@mdo">Cadastrar marca</button>

        <?php
        include_once('../includes/modal_marcas.php');
        ?>
    </div>

    <div class="container" id="tabela-ativos">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $ativo) {
                ?>
                    <tr>
                        <td><?php echo $ativo['idMarca']; ?></td>
                        <td><?php echo $ativo['descricaoMarca']; ?></td>
                        <td><?php echo $ativo['statusMarca']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>