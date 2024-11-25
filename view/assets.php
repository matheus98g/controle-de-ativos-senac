<?php
include('../controller/sessionController.php');
include('../includes/head.php') //scripts e html principal
?>

<body>
    <?php
    include('../includes/menu.php')
    ?>
    <div class="container mt-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar novo</button>

        <?php
        include_once('../includes/assets_modal.php');
        ?>
</body>