<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $host = 'localhost';
    $dbname = 'tcc';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE reset_token = :token AND reset_token_expires > NOW()");
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch();

        if (!$user) {
            die('Token inválido ou expirado!');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['senha'])) {
            $nova_senha = $_POST['senha'];

            if (strlen($nova_senha) < 6) {
                die('A senha deve ter pelo menos 6 caracteres.');
            }

            $senha_criptografada = password_hash($nova_senha, PASSWORD_BCRYPT);

            $stmt_update = $pdo->prepare("UPDATE usuarios SET senha = :senha, reset_token = NULL, reset_token_expires = NULL WHERE id = :id");
            $stmt_update->execute(['senha' => $senha_criptografada, 'id' => $user['id']]);

            echo 'Sua senha foi atualizada com sucesso!';
        } else {
            echo '
            <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Redefinir Senha</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
                    <style>
                        .form-signin {
                            display: flex;
                            border-radius: 8px;
                            margin-top: 30px;
                            border: 1px solid #F0F0F0;
                            background-color: #FCFCFC;
                            flex-direction: column;
                            justify-content: center;
                            width: 100%;
                            max-width: 430px;
                            font-size: 18px;
                            padding: 23px;
                        }

                        .form-signin .form-control {
                            position: relative;
                            height: auto;
                            margin-left: auto;
                            padding: 5px 15px;
                            font-size: 18px;
                            border-radius: 4px;
                        }

                        h4 {
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        .container {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }

                        .btn-btn-login {
                            border: none;
                            background-color: #cc5dfc;
                            background: linear-gradient(to left, #aa57fa, #cc5dfc);
                            color: white;
                            font-size: 25px;
                            transition: 0.3s ease-in-out;
                            border-radius: 4px;
                            width: 100%;
                            padding: 10px;
                        }

                        .btn-btn-login:hover {
                            background-color: #A843F6;
                            color: white;
                            font-size: 25px;
                            transition: 0.3s ease-in-out;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="form-signin">
                            <h4>Insira sua nova senha</h4>
                            <form action="" method="POST">
                                <input type="hidden" name="token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">
                                <div class="mb-2">
                                    <label for="senha" class="form-label d-none">Nova senha:</label>
                                    <input placeholder="Digite aqui..." type="password" name="senha" id="senha" class="form-control" required>
                                </div>
                                <button type="submit" class="btn-btn-login fs-4">Confirmar</button>
                            </form>
                            <div class="text-center mt-3">
                                <img src="../img/logopng.png" width="105" alt="">
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                </body>
            </html>';
        }
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
} else {
    die('Token não fornecido!');
}
?>
