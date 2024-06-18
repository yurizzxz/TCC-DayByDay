<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Bem vindo ao DayByDay!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #F8F6F6;
        }

        #perfil-all {
            width: 40%;
            height: 100vh;
            background-color: #F8F6F6;
        }

        .profile-content {
            color: black;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 768px) {
            #perfil-all {
                width: 100%;
            }
        }

        .profile-pic-user {
            background-color: black;
            padding: 120px;
            justify-content: center;
            align-items: center;
        }

        .user-infos input {
            width: 240px;
            height: 4vh;
            border: none;
            padding-left: 2px;
            background-color: transparent;
            border-bottom: 1px solid black;
            color: gray;
        }

        .user-infos input:focus {
            outline: none;
        }

        .btn-save-user {
            width: 240px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            flex-direction: column;
            display: flex;
            font-size: 20px;
            margin-bottom: 20px;
            align-items: center;
            background-color: #8C52FF;
            background: linear-gradient(to left, #7c3bff, #8C52FF);
            color: white;
        }

        
    </style>
</head>

<body>
    <div class="container justify-content-center align-items-center" id="perfil-all">
        <div class="container-fluid">
            <div class="button-close" style="padding-top: 30px">
                <a href="index.php?p=notas" class="fw-bold" ><ion-icon name="close-outline" style="color: black; font-size: 30px"></ion-icon></a>
            </div>
            <div class="profile-content justify-content-center align-items-center">
                <div class="user-pic">
                    <input type="file" class="d-none"><img src="" class="profile-pic-user" alt="">
                </div>
                <p class="text-muted mt-3" style="font-size: 12px">// clique para alterar sua foto de exibição</p>
                <div class="user-infos mt-3">
                    <div class="user-name">
                        <h5 style="margin-bottom: -2px">Nome</h5>
                        <input type="text" value="$nome" id="input-user-info">
                    </div>
                    <div class="user-email mt-3">
                        <h5 style="margin-bottom: -2px">Email</h5>
                        <input type="email" value="$email" id="input-user-info">
                    </div>
                    <div class="user-pass mt-3">
                        <h5 style="margin-bottom: -2px">Senha</h5>
                        <input type="password" value="$password" id="input-user-info">
                    </div>
                    <div class="confirm-user-pass mt-3">
                        <h5 style="margin-bottom: -2px">Confirme sua senha</h5>
                        <input type="password" value="$password" id="input-user-info">
                    </div>
                </div>
                <div class="btn-save" style="margin-top: 30px">
                    <button class="btn-save-user" type="submit">Confirmar</button>
                    <a href="#" class="text-danger text-center" style="margin-left: 30%">Excluir Conta</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<? include_once 'scripts.php' ?>