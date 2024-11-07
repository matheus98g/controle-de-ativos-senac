<?php
include('../includes/head.php') //scripts e html principal
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Login</h3>

                <!-- Formulário de Login -->
                <form action="../controller/login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </div>

                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
                        echo '<div class="alert alert-danger">Usuário ou senha inválidos!</div>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>



</body>

</html>