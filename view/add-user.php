<?php
include('../includes/head.php') //scripts e html principal
?>

<body class="bg-dark text-white">

    <div class="container mt-5">
        <h2>Criar uma nova conta</h2>
        <form onsubmit="return validatePassword()" action="../controller/newUserController.php" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario*</label>
                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Escolha um nome de usuairo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Seu email" required>
            </div>
            <div class="mb-3">
                <label for="turma" class="form-label">Turma*</label>
                <input type="text" name="turma" class="form-control" id="turma" placeholder="Sua turma" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha*</label>
                <input type="password" class="form-control" id="password" placeholder="Informe uma senha" name="password" required>
                <div id="password-error-message" class="invalid-feedback">
                    <!-- Mensagem de erro da senha -->
                </div>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirme a senha*</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirme a senha" name="confirm_password" required>
                <div id="error-message" class="invalid-feedback">
                    Senhas não conferem!
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

</body>

</html>