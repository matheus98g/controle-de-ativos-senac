<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Input Transparente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Estilo personalizado para inputs com transparência (ajustado para usar Bootstrap) */
        .input-transparente {
            background-color: rgba(255, 255, 255, 0.5);
            /* Cor branca com transparência */
        }

        .input-transparente:focus {
            background-color: rgba(255, 255, 255, 0.7);
            /* Aumenta a opacidade ao focar no campo */
        }

        /* Estilo para o fundo */
        body {
            background-image: url('../assets/images/background-login.jpg');
            /* Verifique o caminho */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            height: 100vh;
            color: white;
        }

        /* Adicionando bordas arredondadas e sombra com Bootstrap */
        .form-container {
            background-color: rgba(0, 0, 0, 0.5);
            /* Fundo semitransparente para destacar o formulário */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
    // Verificar se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Buscar o usuário no banco de dados
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE nomeUsuario = ?");
        $stmt->execute([$usuario]);
        $usuario_bd = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se o usuário existe e se a senha fornecida é válida
        if ($usuario_bd && password_verify($senha, $usuario_bd['senha'])) {
            // Login bem-sucedido
            echo "Login bem-sucedido!";
            // Redirecionar ou armazenar a sessão do usuário
            session_start();
            $_SESSION['usuario_id'] = $usuario_bd['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            // Login falhou
            echo "Usuário ou senha inválidos!";
        }
    }
    ?>

    <!-- Container do formulário, agora centralizado -->
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST" action="processar_formulario.php">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control input-transparente" id="email" name="email" placeholder="Digite seu e-mail..." required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control input-transparente" id="password" name="password" placeholder="Digite sua senha..." required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>


</body>

</html>