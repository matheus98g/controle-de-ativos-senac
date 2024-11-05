<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        // Validação das senhas
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            // Check se as senhas conferem
            if (password !== confirmPassword) {
                document.getElementById("error-message").innerText = "Senhas não conferem!";
                document.getElementById("confirm_password").classList.add("is-invalid");
                return false;
            } else {
                document.getElementById("error-message").innerText = "";
                document.getElementById("confirm_password").classList.remove("is-invalid");
                document.getElementById("confirm_password").classList.add("is-valid");
                return true;
            }
        }
    </script>
</head>

<body class="bg-dark text-white">

    <div class="container mt-5">
        <h2>Criar uma nova conta</h2>
        <form onsubmit="return validatePassword()" action="../controller/newUserController.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome*</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome" required>
            </div>
            <!-- <div class="mb-3">
                <label for="user" class="form-label">Usuario*</label>
                <input type="text" name="user" class="form-control" id="user" placeholder="Seu nome" required>
            </div> -->
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