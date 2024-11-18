<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
           
            <h4>Recuperar Senha</h4>
            <form action="processa_recuperacao.php" method="POST">
                <div class="mb-2">
                    <label for="email" class="form-label">Digite seu e-mail:</label>
                    <input placeholder="Digite aqui..." type="email" name="email" id="email" class="form-control" required>
                </div>
                <button type="submit" class="btn-btn-login">Enviar</button>
            </form>
            <div class="text-center mt-3">
                <img src="../img/logopng.png" width="105" alt="">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>